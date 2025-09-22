<?php
//create connection

include 'connect.php';

// $id = $_GET['id'];

// read one record by id 
// $sql = "SELECT * FROM products WHERE id=1";

// read one record by name
// $sql = "SELECT * FROM products WHERE name='keyboard'";

// read one record by price
$sql = "SELECT * FROM products WHERE price=150000";

// objek hasil query tadi
$result = $conn->query($sql);

// menyusun agar teratur menggunakan : fetch_assoc(), mengumpulkan data
// sumber baca dari table
//  row diambil fetch asosiatif
$row = $result->fetch_assoc();


// view data
echo "ID: " .$row['id'] . "<br>";
echo "Name: " . $row['name'] . "<br>";
echo "Description: " . $row['description'] . "<br>";
echo "Price: " . $row['price'] . "<br>";
echo "Created: " .$row['created'];



// echo "<table>
//     <tr><th>ID</th><th>Name</th><th>Description</th><th>price</th><th>Created</th></tr>
//     <tr><td>" . $row['id']"
//     </table>"

    echo "<a href='form_input_product.php'>Add Product</a>";

    echo"<table border = 'bold'>
    <tr>
    <th>Product ID</th><th>Product Name</th><th>Product Description</th><th>Product Description</th><th>Created</th>
    </tr>

    <tr>
    <td>" .$row['id'] . "</td><td>" .$row['name'] . "</td><td>" .$row['price'] . "</td><td>" .$row['description'] . "</td><td>" .$row['created'] . "</td>
    </tr>
    </table><br>";
    echo "Product ID: " . $row['id'] . " Product Name: " . $row['name'] . " Product Description: " . $row['description'] . " Product Price: " . $row['price'] . " Created: " . $row['created'];

    // close connection
    $conn->close();
?>
?>
