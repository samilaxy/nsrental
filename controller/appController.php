<?php
require '../lib/Session.php';
include '../helper/format.php';
include_once('../lib/Database.php');

$db       = new Database();
$fm       = new Format();
$salt = "thiscanbeaNYTHING";

//$id = htmlentities($_GET['id']);
//singup client
if(isset($_POST['register'])){
    $fullname = mysqli_real_escape_string($db->link, $fm->validation($_POST['fullname']));
    $email = mysqli_real_escape_string($db->link, $fm->validation($_POST['email']));
    $phone = mysqli_real_escape_string($db->link, $fm->validation($_POST['phone']));
    $password1 = mysqli_real_escape_string($db->link, $fm->validation($_POST['password1']));
    $password2 = mysqli_real_escape_string($db->link, $fm->validation($_POST['password2']));

    if($fm->passwordMatch($password1,$password2)){
        if($fm->isValidEmail($email)){

            $encPass = md5(($password1).$salt);
            $Query = "INSERT INTO tbl_clients(fullname, email, phone, password)
            VALUES ('$fullname', '$email', '$phone','$encPass')";

            $insert = $db->insert($Query);

            if($insert){
                $_SESSION['message'] = 'Registration Successful';
                echo "<script>window.location.href=('../templates/login.php');</script>";
              }else{
                $_SESSION['message'] = 'Oops!!...Error...Something Went Wrong, try again';
                echo "<script>window.location='../templates/signup.php';</script>";
              }   
        }
        else
        {
            $_SESSION['message'] = 'This email is not valid';
            echo "<script>window.location='../templates/signup.php';</script>";
        }
    }
    else
    {
        $_SESSION['message'] = 'Your Password Do Not Match';
        echo "<script>window.location='../templates/signup.php';</script>";
    }

}
else
 //login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db->link, $fm->validation($_POST['email']));
    $password = mysqli_real_escape_string($db->link, $fm->validation(md5($_POST['password'].$salt)));
     

    $Query = "SELECT * FROM tbl_clients WHERE `email` = '$email' && `password` = '$password'";
    $result = $db->select($Query);
    if ($result) {
        $_SESSION["email"] = $email;
        header("Location: ../client/client.php");
    }else{
        $_SESSION['message'] = 'Incorrect Email or Password';
        echo "<script type='text/javascript'>
                  window.location.href=('../templates/login.php');
              </script>";
    }
}else{}

?>