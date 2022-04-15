<?php

 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyPOS Signup</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<?php include 'dbconn.php'; ?>
<?php  
 if(isset($_POST['submit'])) {
 
    $shopname = $_POST['shopname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password , PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword , PASSWORD_BCRYPT);

    $token = bin2hex(random_bytes(15));


    $emailquery = "select * from register where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount > 0){
        ?>
        <script>
            alert("User already exist");
        </script>
        <?php
    }else{
        if($password === $cpassword){
            $insertquery = "insert into register(shop_name, email, mobile, password, cpassword, token, status) values('$shopname','$email','$mobile','$pass','$cpass','$token','inactive') ";
            $iquery = mysqli_query($con , $insertquery);

            if($iquery){
               
                
                $subject = "Account verification message";
                $body = "Hii, $email. click here to activate your account http://localhost/EasyPOS/activate.php?token=$token ";
                $sender_email = "From: anshumankumar421@gmail.com";

                if(mail($email, $subject, $body, $sender_email)) {
                   $_SESSION['msg'] = "check your email to activate your account $email";
                   header('location:login.php');
                } else {
                    echo "Email sending failed...";
                }

            }else{
               ?>
                <script>
                    alert("Please try again");
                </script>
               <?php
            }

        }else{
        
            ?>
            <script>
                alert("Please try again, password didn't match");
            </script>
           <?php
        }
    }
 }

?>

    <div class="container">
        <h1 style="text-align: center">SIGN UP</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="shopname">Enter Shop Name</label>
            <input type="text" class="input" name="shopname" autocomplete="off" id="shopname" placeholder="Enter Shop Name " required>
            <label for="user_email">Email</label>
            <input type="email" class="input" name="email" autocomplete="off" id="user_email" placeholder="Enter  your email" required>
            <label for="user_mobile">Mobile.No</label>
            <input type="text" class="input" name="mobile" pattern="[0-9]*" autocomplete="off" id="user_mobile" placeholder="Enter your mobile number " required>
            <label for="user_password">Password</label>
            <input type="password" class="input" name="password" autocomplete="off" id="user_password" placeholder="Enter your password " required>
            <label for="user_cpassword">Confirm Password</label>
            <input type="password" class="input" name="cpassword" autocomplete="off" id="user_cpassword" placeholder="Enter confirm password " required>
           
            <input type="submit" value="Register" name="submit">
           
        </form>
    </div>
</body>
</html>