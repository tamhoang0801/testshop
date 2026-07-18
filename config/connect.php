<?php
$host = "localhost";
$username = "Database";
$password = "Shop@0801";
$database = "test";

$conn = new PDO("mysql:host=$host;dbname=$database;charset=UTF8", $username, $password);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>