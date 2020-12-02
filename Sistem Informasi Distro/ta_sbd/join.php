<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT a.NAMA_BARANG, a.JENIS_BARANG, b.JUMLAH, b.ID_CUSTOMER 
FROM barang a LEFT JOIN penjualan b 
ON a.ID_BARANG = b.ID_BARANG");
?>
<html>
<head>    
    <title>Halaman JOIN</title>
</head>

<body>
    <h1><center>Sistem Informasi Distro</center></h1>
    <center>
    
     <table width='80%' border=1>

    <tr>
        <th>NAMA_BARANG</th> <th>JENIS_BARANG</th> <th>JUMLAH</th> <th>ID_CUSTOMER</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['NAMA_BARANG']."</td>";
        echo "<td>".$user_data['JENIS_BARANG']."</td>"; 
        echo "<td>".$user_data['JUMLAH']."</td>";   
        echo "<td>".$user_data['ID_CUSTOMER']."</td>";
    }
    ?>
    </table>
    </center>
    <?php
        echo "<center><a href=index.php>Halaman Awal</a></center>";
    ?>
</body>
</html>