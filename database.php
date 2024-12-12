<?php 

//Database configuration
$host = '127.0.0.1';
$port = 3306;
$dbName = 'finals';
$username = 'root';
$password = '';

//conntection string
$con = mysqli_connect($host,$username,$password,$dbName);

$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);

    // set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* echo "Database connnected....."; */

    // You are now connected to the database, and $pdo contains the connection object

    // you can perform database operations here
} catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}