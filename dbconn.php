<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "EasyPOS";

$con = mysqli_connect($server,$user,$password,$db);

 if($con){
     ?>
     <script>
        // alert("Connection Successful");
     </script>
     <?php
 }else{
    ?>
     <script>
        // alert(" No Connection");
     </script>
    <?php
 }
?>