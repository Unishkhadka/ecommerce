<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";

if(isset($_POST['signup'])){
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    $sql = "INSERT into users(`fullname`, `email`, `password`, `phone`) VALUES('$fullname', '$email', '$hash', '$phone')";

    $insert = $con->query($sql);
    if($insert){
        echo "Data inserted successfully";
    }
    else{
        echo "Failed to upload data";
    }
    header("Location: /ecommerce/login/login.php");
}
?>