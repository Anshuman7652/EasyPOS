<?php
 
 session_start();
 include 'dbconn.php';

 if(isset($_GET['token'])){

    $token = $_GET['token'];
    
    $update_status = " update register set status='active' where token='$token' ";

    $query = mysqli_query($con,$update_status);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account verified successfully";
            header('location:login.php');
        }else{
            $_SESSION['msg'] = "you are logged out.";
            header('location:login.php');
        }
    }else{
        $_SESSION['msg'] = "Account not verified";
            header('location:signup.php');
    }
 }
 
?>