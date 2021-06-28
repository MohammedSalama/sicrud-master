<?php 

session_start();

require "lib.php";

if(empty($_SESSION['user']))
{
    header("location: login.php");
}

$userrole = userRole();

$data = AllData();

require "design/index.php";