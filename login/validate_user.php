<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE `email`='$email'";
    $user = $con->query($sql);

    if($user){
    // if($user->num_rows>0){
            if(mysqli_num_rows($user)>0){
        while($row = $user->fetch_assoc()){
            if(password_verify($password, $row['password'])){
        echo "User found";
        $_SESSION['loggedin'] =true;
        header("Location: /ecommerce/index.php");
        }}}
    }
    else{
        echo "User not found.";
        $_SESSION['status'] = "Email or Password is incorrect!!";
        header("Location: /ecommerce/login/login.php");
    }}
?>