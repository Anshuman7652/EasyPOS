<?php

 session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyPOS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<?php include 'navbar.php'; ?>

<?php  include 'dbconn.php' ?>
<?php
  if(isset($_POST['submit'])) {
      $email =$_POST['useremail'];
      $password =$_POST['password'];

      $emailsearch = "select * from register where email='$email' and status='active' ";
      $query = mysqli_query($con,$emailsearch);

      $emailcount = mysqli_num_rows($query);

      if($emailcount){
          $email_pass = mysqli_fetch_assoc($query);

          $db_pass = $email_pass['password'];
          $_SESSION['shopname'] = $email_pass['shop_name'];

          $pass_decode = password_verify($password, $db_pass);
 
           if($pass_decode){
               echo "login successful";
               header('location:home.php');
           }else{
               echo "password incorrect";
           }
      }else{
          echo "invalid email";
      }
  }



?>

<div class="container">
        <h1>LOGIN</h1>
        <p> <?php echo $_SESSION['msg'];   ?> </p>
        <form action="login.php" method="POST">
            <label for="user_email">Email</label>
            <input type="email" class="input" name="useremail" autocomplete="off" id="user_email" placeholder="Enter admin name " required>
            <label for="user_password">Password</label>
            <input type="password" class="input" name="password" autocomplete="off" id="user_password" placeholder="Enter admin password " required>
            <input type="submit" value="Submit" name="submit">
            <a href="forgot_password.php"><button type="button" class="btn btn-primary">Forgot Password</button></a>
            <!-- <div class="link"><a href="./logout">Login</a></div> -->
        </form>
</div>
</body>
</html>