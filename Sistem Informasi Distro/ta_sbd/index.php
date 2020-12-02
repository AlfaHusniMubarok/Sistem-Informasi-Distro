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
$result = mysqli_query($mysqli, "SELECT * FROM barang");
$cari = $_POST['Kata'];
if($cari !=''){
    $result = mysqli_query($mysqli, "SELECT * FROM barang WHERE ID_BARANG LIKE'%".$cari."%' OR
    NAMA_BARANG LIKE'%".$cari."%' OR JENIS_BARANG LIKE'%".$cari."%' ");
} else{
    $result = mysqli_query($mysqli, "SELECT * FROM barang");
}
?>

<html>
<head>    
    <title>Halaman Awal</title>
</head>

<body>
<a href="add.php">Tambah Barang</a><br/><br/>

    <h1><center>Sistem Informasi Distro</center></h1>
    <center>
    <form action="" method="post">
    <input type="text" name="Kata" placeholder="Cari data....">
    <button type="submit" name="Cari">Cari!</button>
    </form>
     <table width='80%' border=1>

    <tr>
        <th>ID_BARANG</th> <th>NAMA_BARANG</th> <th>JENIS_BARANG</th> <th>STOCK</th> <th>HARGA</th> <th>UBAH DATA</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['ID_BARANG']."</td>";
        echo "<td>".$user_data['NAMA_BARANG']."</td>";
        echo "<td>".$user_data['JENIS_BARANG']."</td>"; 
        echo "<td>".$user_data['STOCK']."</td>";   
        echo "<td>".$user_data['HARGA']."</td>";
        echo "<td><a href='edit.php?id=$user_data[ID_BARANG]'>Edit</a> | <a href='delete.php?id=$user_data[ID_BARANG]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    </center>
    <?php
        echo "<center><a href=penjualan.php>Penjualan</a> | <a href=customer.php>Customer</a> | <a href=join.php>Join</a> | <a href=join2.php>Join2</a> | <a href=logout.php>Logout</a></center>";
    ?>
</body>
</html>

