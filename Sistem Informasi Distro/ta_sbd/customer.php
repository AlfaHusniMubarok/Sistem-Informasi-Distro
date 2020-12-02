<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
error_reporting(0);
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM customer");
$cari = $_POST['Kata'];
if($cari !=''){
    $result = mysqli_query($mysqli, "SELECT * FROM customer WHERE ID_CUSTOMER LIKE'%".$cari."%' OR
    NAMA_CUSTOMER LIKE'%".$cari."%' OR ALAMAT LIKE'%".$cari."%' ");
} else{
    $result = mysqli_query($mysqli, "SELECT * FROM customer");
}
?>

<html>
<head>    
    <title>Halaman Customer</title>
</head>

<body>
<a href="addcustomer.php">Tambah data customer</a><br/><br/>

    <h1><center>Sistem Informasi Distro</center></h1>
    <center>
    <form action="" method="post">
    <input type="text" name="Kata" placeholder="Cari data....">
    <button type="submit" name="Cari">Cari!</button>
    </form>
     <table width='80%' border=1>

    <tr>
        <th>ID_CUSTOMER</th> <th>ALAMAT</th> <th>NAMA_CUSTOMER</th> <th>UBAH DATA</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['ID_CUSTOMER']."</td>";
        echo "<td>".$user_data['ALAMAT']."</td>";
        echo "<td>".$user_data['NAMA_CUSTOMER']."</td>"; 
        echo "<td><a href='editcustomer.php?id=$user_data[ID_CUSTOMER]'>Edit</a> | <a href='deletecustomer.php?id=$user_data[ID_CUSTOMER]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    </center>
    <?php
        echo "<center><a href=index.php>Kembali Awal</a></center>";
    ?>
</body>
</html>