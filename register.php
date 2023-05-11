<?php 
require 'action.php';

if(isset($_POST['auth-submit'])){
    if(register()){
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
    <title>Document</title>
</head>
<body>
    <div class="form-reg-container">
        <?php 
        if(isset($_GET['message'])) {
            $msg = $_GET['message'];
            echo $msg;
        }
        
        ?>

             <form action="" method="post">
        <ul>
                <li>
                 <label for="fname">Full Name</label>
                 <input type="text" name="fname" id="fname" placeholder="Full Name" required>
                </li>
            
            <li>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </li>

            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
            </li>
            <li>
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" autocomplete="off" required>
            </li>
            <li>
                <input type="hidden" name="role" value="user">
            </li>
            <li>
                <button type="submit" name="auth-submit">Submit</button>
            </li>
        </ul>
        
    </form>

    </div>
   
</body>
</html>