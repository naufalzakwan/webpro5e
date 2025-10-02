<?php
  include 'connect.php';

  $username = $_POST['username'];
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];

  $hashed_password = hash('sha256', $password);

  $sql = "INSERT INTO users (username, password, fullname) 
          VALUES ('$username', '$hashed_password', '$fullname')";

  if ($conn->query($sql) === TRUE) {
    echo "User berhasil didaftarkan!";
  } else {
    echo "Error: " . $conn->error;
  }

  $conn->close();
?>
