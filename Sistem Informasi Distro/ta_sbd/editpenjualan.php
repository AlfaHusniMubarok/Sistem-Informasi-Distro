<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
        $id = $_POST['ID_PENJUALAN'];
        $bar = $_POST['ID_BARANG'];
        $jum = $_POST['JUMLAH'];
        $peng = $_POST['ID_PENGGUNA'];
        $cus = $_POST['ID_CUSTOMER'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjualan 
    SET ID_BARANG='$bar',JUMLAH='$jum',
    ID_PENGGUNA=$peng,ID_CUSTOMER=$cus WHERE ID_PENJUALAN=$id");

    // Redirect to homepage to display updated user in list
    header("Location: penjualan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjualan WHERE ID_PENJUALAN=$id");

while($user_data = mysqli_fetch_array($result))
{
    $bar = $user_data['ID_BARANG'];
    $jum = $user_data['JUMLAH'];
    $peng = $user_data['ID_PENGGUNA'];
    $cus = $user_data['ID_CUSTOMER'];
}
?>
<html>
<head>  
    <title>Ubah Data Penjualan</title>
</head>

<body>
    <a href="penjualan.php">Ke Penjualan</a>
    <br/><br/>

    <h2>Sistem Informasi Distro</h2>

    <form name="update_penjualan" method="post" action="editpenjualan.php">
        <table border="0">
            <tr> 
                <td>ID_BARANG</td>
                <td><input type="int" name="ID_BARANG" value=<?php echo $bar;?>></td>
            </tr>
            <tr> 
                <td>JUMLAH</td>
                <td><input type="int" name="JUMLAH" value=<?php echo $jum;?>></td>
            </tr>
            <tr> 
                <td>ID_PENGGUNA</td>
                <td><input type="int" name="ID_PENGGUNA" value=<?php echo $peng;?>></td>
            </tr>
            <tr> 
                <td>ID_CUSTOMER</td>
                <td><input type="int" name="ID_CUSTOMER" value=<?php echo $cus;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="ID_PENJUALAN" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Ubah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
