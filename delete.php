<?php
session_start();


if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: index.php');
    exit();
}

include('database.php');


$isDeleteRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'delete');

if ($isDeleteRequest){
    $id = $_POST['id'];
    $sql = 'DELETE FROM events WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $params = ['id' => $id];
    $stmt->execute($params);

// Execute the statement
    $stmt->execute($params);

    // Log the recent activity
    $actionType = 'Event Removed';
    $actionDetails = " '{$event}' removed from the event list.";
    $logSql = 'INSERT INTO recent_activities (action_type, action_details) VALUES (:action_type, :action_details)';
    $logStmt = $pdo->prepare($logSql);
    $logParams = [
        'action_type' => $actionType,
        'action_details' => $actionDetails
    ];
    $logStmt->execute($logParams);
    
    header('Location: events.php');
}