<?php 

//INSERT
function register($name,$email,$password,$img)
{
    $conn = mysqli_connect("localhost","root","","first_pro");
    mysqli_query($conn,"INSERT INTO `user`(`name`, `email`, `password` , `img`) VALUES ('$name','$email','$password','$img') ");
    $res = mysqli_affected_rows($conn);
    if($res == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}

//login SELECT
function login($email,$password)
{
    $conn = mysqli_connect("localhost","root","","first_pro");
    $myq = mysqli_query($conn,"SELECT * FROM `user` WHERE `email` = '$email'AND `password` = '$password' ");
    $res = mysqli_fetch_assoc($myq);

    return $res;
}

//HASH DATA 
function hash_pass($password)
{
    return sha1($password);
}

function AllData()
{
    $conn = mysqli_connect("localhost","root","","first_pro");
    $myq = mysqli_query($conn,"SELECT `id` , `name` , `email` , `img` FROM `user` ");
    $data = [];
    while ($res = mysqli_fetch_assoc($myq))
    {
        $data[] = $res;
    }
    return $data;

}

function userRole()
{
    return $_SESSION['user']['user_role'];
}



// function DELETE THE SAME AS function REGISTER
 
function deleteUser($id)
{
   
    $conn = mysqli_connect("localhost","root","","first_pro");
    mysqli_query($conn,"DELETE FROM `user` WHERE `id` = '$id' ");
    $res = mysqli_affected_rows($conn);
    if($res == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}


// FUNCTION getuser in update THE SAME AS FUNCTION login
// BECAUSE IT CONTAINS ONE ROW
function GetUserById($id)
{
    $conn = mysqli_connect("localhost","root","","first_pro");
    $myq = mysqli_query($conn,"SELECT `id` , `name` , `email` , `img` FROM `user` WHERE `id` = '$id' ");
    $data = [];
    $data = mysqli_fetch_assoc($myq);
    return $data;
}


// FUNCTION UPDATE THE SAME AS FUNCTION deleteUser
function updateUser($id,$name,$email,$password,$img)
{
    $conn = mysqli_connect("localhost","root","","first_pro");
    $sql = "UPDATE `user` SET ";
    if(!empty($name))
    {
        $sql .= " `name` = '$name' ";
    }

    if(!empty($email))
    {
        $sql .= " , `email` = '$email' ";
    }

    if(!empty($password))
    {
        $newpassword = hash_pass($password);
        $sql .= " ,`password` = '$newpassword' ";
    }

    if(!empty($img))
    {
        $sql .= " , `img` = '$img' ";
    }
    
    $sql .= " WHERE `id` = $id ";

    // echo $sql; die();
    mysqli_query($conn,$sql);
    $res = mysqli_affected_rows($conn);
    if($res == 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}