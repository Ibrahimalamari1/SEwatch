<?php
$host = 'localhost';
$username = 'root';
$password = ''; // Default MySQL password for XAMPP is empty
$dbname = 'dbwatches';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>