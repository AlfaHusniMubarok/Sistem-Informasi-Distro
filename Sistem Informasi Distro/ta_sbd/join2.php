<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT a.ID_BARANG, a.JUMLAH, b.NAMA_CUSTOMER, b.ALAMAT 
FROM penjualan a INNER JOIN customer b 
ON a.ID_CUSTOMER = b.ID_CUSTOMER");
?>
<html>
<head>    
    <title>Halaman JOIN #2</title>
</head>

<body>
    <h1><center>Sistem Informasi Distro</center></h1>
    <center>
    
     <table width='80%' border=1>

    <tr>
        <th>ID_BARANG</th> <th>JUMLAH</th> <th>NAMA_CUSTOMER</th> <th>ALAMAT</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['ID_BARANG']."</td>";
        echo "<td>".$user_data['JUMLAH']."</td>"; 
        echo "<td>".$user_data['NAMA_CUSTOMER']."</td>";   
        echo "<td>".$user_data['ALAMAT']."</td>";
    }
    ?>
    </table>
    </center>
    <?php
        echo "<center><a href=index.php>Halaman Awal</a></center>";
    ?>
</body>
</html>