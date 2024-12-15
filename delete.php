<?php
include('database.php');

$isDeleteRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'delete');

if ($isDeleteRequest) {
    $id = $_POST['id'];

    // Step 1: Get the event name from the database
    $fetchEventSql = 'SELECT event FROM events WHERE id = :id';
    $fetchEventStmt = $pdo->prepare($fetchEventSql);
    $fetchEventStmt->execute(['id' => $id]);
    $event = $fetchEventStmt->fetchColumn();

    // Step 2: Delete the event from the database
    $sql = 'DELETE FROM events WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $params = ['id' => $id];
    $stmt->execute($params);

    // Step 3: Log the recent activity
    $actionType = 'Event Removed';
    $actionDetails = "'{$event}' removed from the event list.";
    $logSql = 'INSERT INTO recent_activities (action_type, action_details) VALUES (:action_type, :action_details)';
    $logStmt = $pdo->prepare($logSql);
    $logParams = [
        'action_type' => $actionType,
        'action_details' => $actionDetails
    ];
    $logStmt->execute($logParams);

    // Step 4: Redirect the user
    header('Location: events.php');
}
