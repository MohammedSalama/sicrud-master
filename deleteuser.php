<?php 

session_start();

require "lib.php";

if(empty($_SESSION['user']))
{
    header("location: login.php");
}

$userId = $_SESSION['user']['id'];
if ($userId== $_GET['id'])
{
    echo "Your Permission Is Invalid";
}
else 
{
    $res = deleteUser( $_GET['id']);

    if ($res == true)
    {
        header("location: index.php");
    }
}