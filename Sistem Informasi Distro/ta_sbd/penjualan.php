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
$result = mysqli_query($mysqli, "SELECT * FROM penjualan");
$cari = $_POST['Kata'];
if($cari !=''){
    $result = mysqli_query($mysqli, "SELECT * FROM penjualan WHERE ID_BARANG LIKE'%".$cari."%' OR
    ID_PENJUALAN LIKE'%".$cari."%' OR JUMLAH LIKE'%".$cari."%' ");
} else{
    $result = mysqli_query($mysqli, "SELECT * FROM penjualan");
}
?>

<html>
<head>    
    <title>Halaman Penjualan</title>
</head>

<body>
<a href="addpenjualan.php">Tambah data penjualan</a><br/><br/>

    <h1><center>Sistem Informasi Distro</center></h1>
    <center>
    <form action="" method="post">
    <input type="text" name="Kata" placeholder="Cari data....">
    <button type="submit" name="Cari">Cari!</button>
    </form>
     <table width='80%' border=1>

    <tr>
        <th>ID_PENJUALAN</th> <th>ID_BARANG</th> <th>JUMLAH</th> <th>ID_PENGGUNA</th> <th>IDCUSTOMER</th> <th>UBAH DATA</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['ID_PENJUALAN']."</td>";
        echo "<td>".$user_data['ID_BARANG']."</td>";
        echo "<td>".$user_data['JUMLAH']."</td>"; 
        echo "<td>".$user_data['ID_PENGGUNA']."</td>";   
        echo "<td>".$user_data['ID_CUSTOMER']."</td>";
        echo "<td><a href='editpenjualan.php?id=$user_data[ID_PENJUALAN]'>Edit</a> | <a href='deletepenjualan.php?id=$user_data[ID_PENJUALAN]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
    </center>
    <?php
        echo "<center><a href=index.php>Kembali Awal</a></center>";
    ?>
</body>
</html>