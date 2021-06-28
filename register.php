<?php 

session_start();
if (!empty($_SESSION['user']))
{
    header("location: index.php");
}

require "lib.php";

if(isset($_POST['name']))
{
    //USER REGISTERED 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

     // IMG
     $tmp = $_FILES['img']['tmp_name'];
     $type = $_FILES['img']['type'];
     $imgname = $_FILES['img']['name'];
     // echo $type;die();
     $typeofar = explode("/",$type);
     // echo '<pre>';
     // print_r($typeofar);
     // echo '</pre>';
     // die();
     $ext = $typeofar[1];
 
    $imgfullname = $name.".".$ext;
    // HASHING PASSWORD 
    $newpassword = hash_pass($password);

        // CONFIRM PASSWORD 
        if($repassword == $password)
        {
                            // USING FUNCTION IN FILE lib.php 

            $result = register($name,$email,$newpassword,$imgfullname);
            if ($result == true)
            {
                move_uploaded_file($tmp,'userimage/'.$name.".".$ext);
                echo "User added Successfully";
            }
            else 
            {
                echo "Failed Data";
            }
        }
        else 
        {
            echo "Password Not Confirmed";
        }
}

require "design/register.html";


?>