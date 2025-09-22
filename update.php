<?php

    //digunakan untuk cek isi, apakah sudah masuk?
    // kenapa tidak masuk ke db

    // jadi ini digunakan untuk cek apakah data dari inputan yang kita isi sudah masuk ke dalam $_POST[]?
    // Jadi kita bikin tampungan / varibale dari $_POST[] sesuai dengan name yang ada di form

    //get data from the edit form

    $prodID = $_POST['id'];
    $prodName = $_POST['name'];
    $prodDesc = $_POST['desc'];
    $prodPrice = $_POST['price'];

    // echo "$prodName";
    // echo "$prodDesc";
    // echo "$prodPrice";

// include, digunakan untuk mengambil isi dari file connect, jadi tidak melakukan perulangan lagi
include 'connect.php';

// update data
// yang terpenting nilai untuk name, ke2 untuk desc, k3 untuk price
$sql = "UPDATE products SET name = '$prodName', description = '$prodDesc', price = $prodPrice WHERE id = $prodID";
// -- VALUES ('$_POST[name]', '$_POST[desc]', '$_POST[price]')";

if (mysqli_query($conn, $sql)) {
  // echo "New record created successfully";
  // redicrect to file read all (view data)
  header('Location: read_all.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>