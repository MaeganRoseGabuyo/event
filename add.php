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
    background-color: #ebf8ff;
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

        <form id="addEventForm" action="submit_event.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="eventTitle">Event Title</label>
                <input type="text" id="eventTitle" name="eventTitle" required placeholder="Enter Event Title">
            </div>

            <div class="form-group">
                <label for="eventDescription">Event Description</label>
                <textarea id="eventDescription" name="eventDescription" required placeholder="Describe the event in a few words"></textarea>
            </div>

            <div class="form-group">
                <label for="eventDate">Event Date</label>
                <input type="date" id="eventDate" name="eventDate" required>
            </div>

            <div class="form-group">
                <label for="eventTime">Event Time</label>
                <input type="time" id="eventTime" name="eventTime" required>
            </div>

            <div class="form-group">
                <label for="eventLocation">Event Location</label>
                <input type="text" id="eventLocation" name="eventLocation" required placeholder="Enter event location">
            </div>

            <div class="form-group">
                <label for="eventImage">Event Image</label>
                <input type="file" id="eventImage" name="eventImage" required>
            </div>

            <div class="form-group">
                <label for="eventCategory">Event Category</label>
                <select id="eventCategory" name="eventCategory" required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="sports">Sports</option>
                    <option value="entertainment">Fitness</option>
                    <option value="seminar">E-Sports</option>
                </select>
            </div>

            <div class="form-group">
                <label for="eventCapacity">Event Capacity</label>
                <input type="number" id="eventCapacity" name="eventCapacity" required placeholder="Max number of participants">
            </div>

            <div class="form-group">
                <label for="eventStatus">Event Status</label>
                <select id="eventStatus" name="eventStatus" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">Save Event</button>
                <button type="button" class="cancel-btn" onclick="window.location.href='events.php'">Cancel</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
