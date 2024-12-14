<?php 

//Database configuration
$host = 'sql311.infinityfree.com';
$port = 3306;
$dbName = 'if0_37913926_finals';
$username = 'if0_37913926';
$password = 'QDz0xS2yOJ';

//conntection string
$con = mysqli_connect($host,$username,$password,$dbName);

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);

    // set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Database connnected....."; 

    // You are now connected to the database, and $pdo contains the connection object

    // you can perform database operations here
} catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}