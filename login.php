<?php
require 'action.php';

 if(isset($_POST['auth-login'])){
    if(cekLogin()){
        exit;
     }
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <div class="form-login">
        <form action="" method="POST">
            <h2>Login Form</h2>
            <p>Please fill in this form to login</p>
            <hr>
            <ul>

                <li>
                     <label for="fullname">ENTER FULLNAME:</label>
                     <input type="text" id="fullname" name="fullname" placeholder="Please input your fullname" autocomplete="off">
                </li>
                <li>
                     <label for="email">Email:</label>
                     <input type="email" id="email" name="email" placeholder="Email" autocomplete="off">
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password">
                </li>
                <li>
                      <hr>
                      <button type="submit" name="auth-login">Login</button>
                </li>
                <li>
                    <a href="#">Forgot your password?</a>
                </li>
            </ul>
           


        </form>
    </div>
    
</body>
</html>