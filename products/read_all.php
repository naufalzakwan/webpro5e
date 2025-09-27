<?php
//create connection

include '../connect.php';

// $id = $_GET['id'];

// read one record by id 
// $sql = "SELECT * FROM products WHERE id=1";

// read one record by name
// $sql = "SELECT * FROM products WHERE name='keyboard'";

// read all record by price
$sql = "SELECT * FROM products";

// objek hasil query tadi
$result = $conn->query($sql);

// menyusun agar teratur menggunakan : fetch_assoc(), mengumpulkan data
// sumber baca dari table
//  row diambil fetch asosiatif

// check is the table empty or not?
if ($result->num_rows > 0) {
    echo "<a href='form_input_product.php'>Add Product</a>";
    echo"<table border = 'bold'>
    <tr>
    <th> ID</th>
    <th> Name</th>
    <th> Description</th>
    <th> Price</th>
    <th>Created</th>
    <th>Action</th>
    </tr>";

    // view data of reach row
    // output data of each row
    while($row = $result->fetch_assoc()) {
     // body of loops
    echo" <tr>
     <td>" .$row['id'] . "</td>
     <td>" .$row['name'] . "</td>
     <td>" .$row['price'] . "</td>
     <td>" .$row['description'] . "</td>
     <td>" .$row['created'] . "</td>
     <td><a href='form_edit_product.php?id=$row[id]'>EDIT</a> |
         <a href='delete.php?id=$row[id]' onclick=\"return confirm('Are you sure');\">DELETE</a>
    </td>
     </tr>";

    }
    echo "</table>";
    
  } else {
    echo "0 results";
  }


// view data
// echo "ID: " .$row['id'] . "<br>";
// echo "Name: " . $row['name'] . "<br>";
// echo "Description: " . $row['description'] . "<br>";
// echo "Price: " . $row['price'] . "<br>";
// echo "Created: " .$row['created'];



// echo "<table>
//     <tr><th>ID</th><th>Name</th><th>Description</th><th>price</th><th>Created</th></tr>
//     <tr><td>" . $row['id']"
//     </table>"


    

    // close connection
    $conn->close();
?>

