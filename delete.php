<?php 
    // create connection
    include 'connect.php';

    $sql = "DELETE FROM products WHERE id = $_GET[id]";

    //  query for delete selected record
    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        // redicrect to file read all (view data)
        header('Location: read_all.php');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      
      mysqli_close($conn);
?>