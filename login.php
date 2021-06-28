<?php 

session_start();
if (!empty($_SESSION['user']))
{
    header("location: index.php");
}

require "lib.php";

if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    //HASHING PASS
    $newpassword = hash_pass($password);
    // USING FUNCTION IN FILE lib.php 
    
    $userData = login($email,$newpassword);
    if (! empty($userData))
    {
       $_SESSION['user'] = $userData;

       header("location: index.php");
    }
    else
    {
        echo "Invalid Data";
    }
}

require "design/login.html";