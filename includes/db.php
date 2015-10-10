<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "streetpong_prod";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> query('SET NAMES utf8');
$conn -> query ('SET CHARACTER_SET utf8_unicode_ci');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>