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
        $id2 = $_POST['ID_CUSTOMER'];
        $alamat = $_POST['ALAMAT'];
        $name = $_POST['NAMA_CUSTOMER'];
    // update user dataat
    $result = mysqli_query($mysqli, "UPDATE customer 
    SET ID_CUSTOMER='$id2',ALAMAT='$alamat',
    NAMA_CUSTOMER=$name");

    // Redirect to homepage to display updated user in list
    header("Location: customer.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id2 = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM customer WHERE ID_CUSTOMER=$id2");

while($user_data = mysqli_fetch_array($result))
{
    $alamat = $user_data['ALAMAT'];
    $name = $user_data['NAMA_CUSTOMER'];
}
?>
<html>
<head>  
    <title>Ubah Data Customer</title>
</head>

<body>
    <a href="customer.php">Ke Customer</a>
    <br/><br/>

    <h2>Sistem Informasi Distro</h2>

    <form name="update_customer" method="post" action="editcustomer.php">
        <table border="0">
            <tr> 
                <td>ALAMAT</td>
                <td><input type="text" name="ALAMAT" value=<?php echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>NAMA_CUSTOMER</td>
                <td><input type="text" name="NAMA_CUSTOMER" value=<?php echo $name;?>></td>
            </tr>
                <tr>
                <td><input type="hidden" name="ID_CUSTOMER" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Ubah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
