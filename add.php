<?php 
session_start();


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_event'])) {
    $event = htmlspecialchars($_POST['event'] ?? '');
    $org = htmlspecialchars($_POST['org'] ?? '');
    $date = htmlspecialchars($_POST['date'] ?? '');
    $start_time = htmlspecialchars($_POST['start_time'] ?? '');
    $end_time = htmlspecialchars($_POST['end_time'] ?? '');
    $loc = htmlspecialchars($_POST['loc'] ?? '');
    $desc = htmlspecialchars($_POST['desc'] ?? '');
    $categ = htmlspecialchars($_POST['categ'] ?? '');

    // Handle the file upload
    if (isset($_FILES['grid_image']) && $_FILES['grid_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $fileName = basename($_FILES['grid_image']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['grid_image']['tmp_name'], $targetFilePath)) {
            $grid_image = $targetFilePath; // Store the relative path
        } else {
            die("Error uploading the file. Please try again.");
        }
    } else {
        die("No valid image file uploaded.");
    }

    // Prepare the SQL INSERT statement
    $sql = 'INSERT INTO events (event, org, `date`, start_time, end_time, loc, `desc`, categ, grid_image) 
            VALUES (:event, :org, :date, :start_time, :end_time, :loc, :desc, :categ, :grid_image)';

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Parameters for the prepared statement
    $params = [
        'event' => $event,
        'org' => $org,
        'date' => $date,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'loc' => $loc,
        'desc' => $desc,
        'categ' => $categ,
        'grid_image' => $grid_image
    ];

    // Execute the statement
    $stmt->execute($params);

    // Log the recent activity
    $actionType = 'Event Added';
    $actionDetails = " '{$event}' added to the event list.";
    $logSql = 'INSERT INTO recent_activities (action_type, action_details) VALUES (:action_type, :action_details)';
    $logStmt = $pdo->prepare($logSql);
    $logParams = [
        'action_type' => $actionType,
        'action_details' => $actionDetails
    ];
    $logStmt->execute($logParams);

    // Redirect to the events page
    header('Location: events.php');
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<style>
    /* Basic Styles */
body {
    font-family: 'Poppins', sans-serif;
    background-color:  #f1ee8e;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 900px;
    margin: 30px auto;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 40px;
}

header h1 {
    font-size: 32px;
    text-align: center;
    color: #333;
    margin-top:5px;
    margin-bottom: 20px;
}

form {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

label {
    font-weight: 600;
    color: #333;
}

input, select, textarea {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="file"] {
    padding: 6px;
}

textarea {
    min-height: 150px;
    resize: vertical;
}

input[type="number"], select {
    max-width: 200px;
}

/* Action Buttons */
.submit-btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.submit-btn:hover {
    background-color: #0056b3;
}

.cancel-btn {
    background-color: #f44336;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.cancel-btn:hover {
    background-color: #d32f2f;
}

/* Success Message */
.success-message {
    font-size: 18px;
    font-weight: bold;
    color: #28a745;
    text-align: center;
    margin-top: 20px;
}

/* Styling the logo */
.logo-container {
    text-align: center; /* Center the logo */
    margin-bottom: 10px; /* Space between the logo and the header */
}

.logo {
    width: 120px; /* Adjust the size of the logo */
    height: auto;
}


</style>
<body>
<div class="container">
    <!-- Logo at the top of the header -->
    <div class="logo-container">
        <img src="images/addlogo.png" alt="Logo" class="logo">
    </div>
    
    <!-- Header Section -->
    <header>
        <h1><i class="fas fa-calendar-plus"></i> Add New Event</h1>
    </header>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="eventTitle">Event Title</label>
                <input type="text" id="eventTitle" name="event" required placeholder="Enter Event Title">
            </div>
            <div class="form-group">
                <label for="eventOrg">Organization</label>
                <input type="text" id="eventOrg" name="org" required placeholder="Enter Organization Name">
            </div>
            <div class="form-group">
                <label for="eventDescription">Event Description</label>
                <textarea id="eventDescription" name="desc" required placeholder="Describe the event in a few words"></textarea>
            </div>

            <div class="form-group">
                <label for="eventDate">Event Date</label>
                <input type="date" id="eventDate" name="date" required>
            </div>

            <div class="form-group">
                <label for="eventTimeStart">Start Event Time</label>
                <input type="time" id="eventTimeEnd" name="start_time" required>
            </div>
            <div class="form-group">
                <label for="eventTimeEnd">End Event Time</label>
                <input type="time" id="eventTimeEnd" name="end_time" required>
            </div>

            <div class="form-group">
                <label for="eventLocation">Event Location</label>
                <input type="text" id="eventLocation" name="loc" required placeholder="Enter event location">
            </div>

            <div class="form-group">
                <label for="eventImage">Event Image</label>
                <input type="file" id="eventImage" name="grid_image" required>
            </div>

            <div class="form-group">
                <label for="eventCategory">Event Category</label>
                <select id="eventCategory" name="categ" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="Sports">Sports</option>
                    <option value="Fitness">Fitness</option>
                    <option value="E-Sports">E-Sports</option>
                </select>
            </div>

            <div class="form-group">
                <label for="eventStatus">Event Status</label>
                <select id="eventStatus" name="eventStatus" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn" name="add_event">Save Event</button>
                <button type="button" class="cancel-btn" onclick="window.location.href='events.php'">Cancel</button>
            </div>
        </form>
    </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const startTimeInput = document.getElementById("eventTimeStart");
        const endTimeInput = document.getElementById("eventTimeEnd");

        // When the start time changes, adjust the min value for the end time
        startTimeInput.addEventListener("input", function () {
            const startTime = startTimeInput.value;
            endTimeInput.min = startTime; // Set the minimum value for the end time
        });

        // When the end time changes, validate it against the start time
        endTimeInput.addEventListener("input", function () {
            const startTime = startTimeInput.value;
            const endTime = endTimeInput.value;

            if (endTime < startTime) {
                alert("End time cannot be earlier than the start time!");
                endTimeInput.value = ""; // Clear the invalid input
            }
        });
    });
</script>
</body>
</html>
