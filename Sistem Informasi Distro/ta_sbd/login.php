<?php
session_start();

if(isset($_SESSION["Login"])){
    header("location: index.php");
    exit;
}
include_once("config.php");
if(isset($_POST["Login"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $query=mysqli_query($mysqli, "SELECT * from pengguna where username = '$username' and password = '$password' ");
    $check=mysqli_num_rows($query);

    if($check > 0){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION["Login"] = true;
        header("location: index.php");
    }
        else{
            echo "<center> Username dan Password Anda salah <br>";
            echo "Silahkan Login kembali</center>";
        }
}
?>

<html>
<head>
    <title>Halaman Login</title>
</head>
<body>
    <center>
        <table border="1">
            <form method="POST">
                <tr><td colspan="2" align="center"> Silahkan Login </td></tr>
                <tr><td>Username<td><input type="text" name="username"></td></tr>
                <tr><td>Password<td><input type="password" name="password"></td></tr>
                <tr><td colspan="2" align="center">
                    <input type="submit" name="Login" value="Login">
                </td></tr>
            </form>
        </table>
    </center>
</body>
</html>