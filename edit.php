<?php
include('database.php');

// Check if an event ID is provided
if (!isset($_GET['id'])) {
    echo "No event ID specified.";
    exit;
}

$eventId = $_GET['id'];

// Fetch the event data to pre-fill the form
$stmt = $pdo->prepare('SELECT * FROM events WHERE id = :id');
$stmt->execute(['id' => $eventId]);
$event = $stmt->fetch();

if (!$event) {
    echo "Event not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['event_name'];
    $eventOrg = $_POST['event_org'];
    $eventDesc = $_POST['event_desc'];
    $eventCateg = $_POST['event_categ'];
    $eventDate = $_POST['event_date'];
    $startTime = $_POST['start_time'];
    $endTime = $_POST['end_time'];
    $eventLocation = $_POST['event_location'];
    $eventImage = $_FILES['event_image'];

    // Handle file upload if a new file is provided
    if ($eventImage['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $fileName = basename($eventImage['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($eventImage['tmp_name'], $targetFilePath)) {
            $eventImagePath = $targetFilePath;
        } else {
            echo "Error uploading the file.";
            exit;
        }
    } else {
        $eventImagePath = $event['grid_image'];
    }

    $updateStmt = $pdo->prepare('UPDATE events SET event = :event, org = :org, `desc` = :desc, categ = :categ, `date` = :date, start_time = :start_time, end_time = :end_time, loc = :loc, grid_image = :grid_image  WHERE id = :id');
    $updateStmt->execute([
        'event' => $eventName,
        'org' => $eventOrg,
        'desc' => $eventDesc,
        'categ' => $eventCateg,
        'date' => $eventDate,
        'start_time' => $startTime,
        'end_time' => $endTime,
        'loc' => $eventLocation,
        'grid_image' => $eventImagePath,
        'id' => $eventId
    ]);

    // Execute the statement
    $stmt->execute($params);

    // Log the recent activity
    $actionType = 'Event Modified';
    $actionDetails = "Event '{$eventName}' details was modified.";
    $logSql = 'INSERT INTO recent_activities (action_type, action_details) VALUES (:action_type, :action_details)';
    $logStmt = $pdo->prepare($logSql);
    $logParams = [
        'action_type' => $actionType,
        'action_details' => $actionDetails
    ];
    $logStmt->execute($logParams);

    header('Location: events.php'); // Redirect back to the events page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Event</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="event_name">Event Name</label>
                <input type="text" class="form-control" id="event_name" name="event_name" value="<?= htmlspecialchars($event['event']) ?>" required>
            </div>
            <div class="form-group">
                <label for="event_org">Organization</label>
                <input type="text" class="form-control" id="event_org" name="event_org" value="<?=!empty($event['org']) ? nl2br(htmlspecialchars($event['org'])): '' ?>" required>
            </div>
            <div class="form-group">
                <label for="event_desc">Event Description</label>
                <textarea class="form-control" id="event_desc" name="event_desc" required><?=!empty($event['desc']) ? nl2br(htmlspecialchars($event['desc'])): '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="<?= htmlspecialchars($event['date']) ?>" required>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" class="form-control" id="start_time" name="start_time" value="<?= htmlspecialchars($event['start_time']) ?>" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="time" class="form-control" id="end_time" name="end_time" value="<?= htmlspecialchars($event['end_time']) ?>" required>
            </div>
            <div class="form-group">
                <label for="event_location">Location</label>
                <input type="text" class="form-control" id="event_location" name="event_location" value="<?= !empty($event['loc']) ? htmlspecialchars($event['loc']): '' ?>" required>
            </div>
            <div class="form-group">
                <label for="event_image">Event Image</label>
                <input type="file" class="form-control" id="event_image" name="event_image" value="<?= htmlspecialchars($event['grid_image']) ?>">
            </div>
            <div class="form-group">
                <label for="event_category">Category</label>
                <select id="eventCategory" name="event_categ" required>
                    <option value="" disabled <?= empty($event['categ']) ? 'selected' : '' ?>>Select Category</option>
                    <option value="Sports" <?= $event['categ'] === 'Sports' ? 'selected' : '' ?>>Sports</option>
                    <option value="Fitness" <?= $event['categ'] === 'Fitness' ? 'selected' : '' ?>>Fitness</option>
                    <option value="E-Sports" <?= $event['categ'] === 'E-Sports' ? 'selected' : '' ?>>E-Sports</option>
                </select>
            </div>
            <div class="form-group">
                <label for="eventStatus">Event Status</label>
                <select id="eventStatus" name="eventStatus" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
            <a href="events.php" class="btn btn-default">Cancel</a>
        </form>
    </div>
</body>
</html>