<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $gender=$_POST['gender'];
    $num=$_POST['phone'];
    $address=$_POST['address'];
    $gmail=$_POST['email'];
    $password=$_POST['password'];

    if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
    {
        $query="insert into form (fname,lname,gender,phone,address,email,password) values ('$first_name','$last_name','$gender','$num','$address','$gmail','$password')";
        mysqli_query($con,$query);
        echo "<script type='text/javascript'> alert('Successfully registered')</script>";
    }
else{
    echo "<script type='text/javascript'> alert('please enter valid info')</script>";
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
    <div class="signup">
    <h1>signup</h1>
    <h4>it will take a minute</h4>
    <form method="post">
        <label">firstname</label>
        <input type="text" name="fname" required>
        <label">lastname</label>
        <input type="text" name="lname" required>
        <label">gender</label>
        <input type="text" name="gender" required>
        <label">contact address</label>
        <input type="tel" name="phone"required>
        <label">address</label>
        <input type="text" name="address"required>
        <label">email</label>
        <input type="email" name="email"required>
        <label">password</label>
        <input type="password" name="password" required>
    <input type="submit" name="" value="submit">
    </form>
    <p>by clicking sign up,you agree to our<br>
    <a href="">Terms and conditions</a>and <a href="#">privacy policy</a>
</p>
<p>Already have an account ?<a href="login.php">Login here</a></p>
</div>
</body>
</html>