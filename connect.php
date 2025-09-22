<?php
$servername = "localhost";
$username = "root";
$password = "";
// jadi di connect perlu menambahkan nama databasenya agar sistem tahu
// kita mengarah kemana
$db = "my5eDB";

// jadi ini sekaligus ngecek database db

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " .  $conn->connect_error);
}
// echo "Connected successfully" ."<br>";
?>