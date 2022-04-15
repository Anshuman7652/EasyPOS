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
<div class="container">
        <h1>Reset Password</h1>
        <form action="login.php" method="POST">
        <label for="user_password">Enter Shop Name</label>
            <input type="text" class="input" name="shopname" autocomplete="off" id="shopname" placeholder="Enter Your Shop Name " required>
            <label for="user_email">Enter Email</label>
            <input type="email" class="input" name="useremail" autocomplete="off" id="user_email" placeholder="Enter admin name " required>
           
            <input type="submit" value="Send OTP" name="submit">
            
            <!-- <div class="link"><a href="./logout">Login</a></div> -->
        </form>
</div>
</body>
</html>