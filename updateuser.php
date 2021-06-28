<?php 

session_start();

require "lib.php";

if(empty($_SESSION['user']))
{
    header("location: login.php");
}

// echo '<pre>';
// print_r($userData);
// echo '</pre>';
// die();
if(isset($_POST['name']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // IMG
    // echo '<pre>';
    // print_r($_FILES['img']);
    // echo '</pre>';
    // die();
    if(!empty($_FILES['img']['tmp_name']))
    {
        // echo "Hello"; die();
        $img = $_FILES['img']['tmp_name'];
        $imgtype = $_FILES['img']['type'];
        $type = explode("/",$imgtype);
        $ext = $type[1];
        $newname = $name.".".$ext;
        move_uploaded_file($img,"userimage/".$newname);
    }
    else 
    {
        $newname = '';
    }
   

    $res = updateUser($id,$name,$email,$password,$newname);
    if($res == true)
    {
        header("location: index.php");
    }
}
else 
{
    $userId = $_GET['id'];

    $userData = GetUserById($userId);
}


require "design/update.php";