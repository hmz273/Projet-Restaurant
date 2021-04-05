<?php include('../config/constants.php');?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.scss">
    <title>Document</title>
</head>
<body>
    <div class="login">
        <h1 class="lg">login</h1>
        <br><br>

        <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }


        if(isset($_SESSION['no-login-message'])){
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>


        <!-- login form S -->
        <form action="" method="post">
            <input type="text" name="username" placeholder="username" ><br><br>
            <input type="password" name="password" placeholder="password" ><br><br>
            <input type="submit" name="submit" value="login" class="sbm">
        </form>
        
          <!-- login form E -->


    </div>


</body>
</html> 



<?php 

//checking submit btn

if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = md5($_POST['password']);


$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";


$res = mysqli_query($conn, $sql);


$count = mysqli_num_rows($res);

if($count==1){
    $_SESSION['login'] = "<div class='update'>welcom.</div>";
    $_SESSION['user'] = $username;
    header('location:' .SITEURL.'admin/');
}

else{
    $_SESSION['login'] = "<div class='error'>not found.</div>";
    header('location:' .SITEURL.'admin/login.php');
}




}

?>