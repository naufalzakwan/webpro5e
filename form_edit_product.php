<?php
//create connection

include 'connect.php';

// $id = $_GET['id'];

// read one record by id 
$sql = "SELECT * FROM products WHERE id=$_GET[id]";

// objek hasil query tadi
$result = $conn->query($sql);

// menyusun agar teratur menggunakan : fetch_assoc(), mengumpulkan data
// sumber baca dari table
//  row diambil fetch asosiatif
$row = $result->fetch_assoc();


// view dat



// echo "<table>
//     <tr><th>ID</th><th>Name</th><th>Description</th><th>price</th><th>Created</th></tr>
//     <tr><td>" . $row['id']"
//     </table>"

?>


<h2>Update Product</h2>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>"readonly>
    Name:<br><input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Description:<br><textarea name="desc"><?=$row['description']?></textarea>
    <br>Price:<br><input type="text" name="price" value="<?=$row['price']?>">
    <input type="submit" value="Update Product">
</form>

<?php
    $conn->close();
?>