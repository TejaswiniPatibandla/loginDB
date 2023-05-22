<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $gmail=$_POST['email'];
    $password=$_POST['password'];
    if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
    {
        $query="select * from form where email='$gmail' limit 1";
        $result=mysqli_query($con,$query);
        if($result){
            if($result && mysqli_num_rows($result)>0)
            {
                $user_date=mysqli_fetch_assoc($result);
                if($user_date['password']==$password)
                {
                    header("location:index.php");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
    }
    else{
        echo "<script type='text/javascript'> alert('wrong username or password')</script>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>login</h1>
        <!-- <h4>it will take a minute</h4> -->
        <form method="post">
            
            <label">email</label>
            <input type="email" name="email"required>
            <label">password</label>
            <input type="password" name="password" required>
        <input type="submit" name="" value="submit">
        </form>
        <p>not have an account?<a href="signup.php">signup here</a></p>
</body>
</html>