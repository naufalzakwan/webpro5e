<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_username = $_POST['old_username'];
    $old_password = hash('sha256', $_POST['old_password']);
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $fullname = $_POST['fullname'];

    // Verifikasi username & password lama
    $check = $conn->query("SELECT * FROM user WHERE id=$id AND username='$old_username' AND password='$old_password'");
    if ($check->num_rows == 0) {
        echo "<script>alert('Username atau password lama salah!');</script>";
    } elseif ($new_password != $confirm_password) {
        echo "<script>alert('Konfirmasi password baru tidak cocok!');</script>";
    } else {
        $hashed_new_password = hash('sha256', $new_password);
        $update = "UPDATE user SET username='$new_username', password='$hashed_new_password', fullname='$fullname' WHERE id=$id";
        if ($conn->query($update) === TRUE) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location='read.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <script>
    function confirmUpdate() {
      return confirm("Apakah kamu yakin ingin merubah data ini?");
    }
  </script>
</head>
<body>
  <h2>Edit Data User</h2>
  <form method="post" onsubmit="return confirmUpdate()">
    <label>Username Lama:</label><br>
    <input type="text" name="old_username" value="<?= $row['username'] ?>" required><br><br>

    <label>Password Lama:</label><br>
    <input type="password" name="old_password" value="<?= $row['password'] ?>" required><br><br>

    <label>Password Baru:</label><br>
    <input type="password" name="new_password" required><br><br>

    <label>Konfirmasi Password Baru:</label><br>
    <input type="password" name="confirm_password" required><br><br>

    <label>Fullname:</label><br>
    <input type="text" name="fullname" value="<?= $row['fullname'] ?>" required><br><br>

    <button type="submit">Update</button>
  </form>
</body>
</html>
