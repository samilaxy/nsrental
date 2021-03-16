<?php
require '../../lib/Session.php';
include '../helper/ClientValidation.php';

$db       = new Database();
$fm       = new ClientValidation();
$salt = "thiscanbeaNYTHING";

//$id = htmlentities($_GET['id']);
//singup client

$uploadOk = 1;
$target_dir = "../uploads/";


if(isset($_POST['registercar'])){
    $carnumber = mysqli_real_escape_string($db->link, $fm->validation($_POST['carnumber']));
    $fullname = mysqli_real_escape_string($db->link, $fm->validation($_POST['fullname']));
    $carname = mysqli_real_escape_string($db->link, $fm->validation($_POST['carname']));
    $model = mysqli_real_escape_string($db->link, $fm->validation($_POST['model']));
    $carType = mysqli_real_escape_string($db->link, $fm->validation($_POST['carType']));
    $seatnumber = mysqli_real_escape_string($db->link, $fm->validation($_POST['seatnumber']));
    $fueltype = mysqli_real_escape_string($db->link, $fm->validation($_POST['fueltype']));
    $price = mysqli_real_escape_string($db->link, $fm->validation($_POST['price']));
    $details = mysqli_real_escape_string($db->link, $fm->validation($_POST['details']));

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if (file_exists($target_file)) 
    {
        $_SESSION['message'] = 'File already exist';
        echo "<script>window.location.href=('../templates/register-car.php');</script>";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        $_SESSION['message'] = 'Sorry, your file is too large.';
        echo "<script>window.location.href=('../templates/register-car.php');</script>";
        $uploadOk = 0;
      }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $_SESSION['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            echo "<script>window.location.href=('../templates/register-car.php');</script>";
            $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      }
      else
      {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
        {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        }
        else
        {
            $_SESSION['message'] = 'Sorry, there was an error uploading your image.';
            echo "<script>window.location.href=('../templates/register-car.php');</script>";
        }
      }

    
        if(!$fm->carExist($carnumber))
        {

            $query = "INSERT INTO tbl_register_car(client, carnumber, carname, model, car_type, seat_number, fuel_type, price, details, image)
            VALUES ('$fullname', '$carnumber', '$carname', '$model','$carType', '$seatnumber', '$fueltype', '$price', '$details', '$target_file')";

            $insert = $db->insert($query);

            if($insert)
            {
                $_SESSION['message'] = 'Registration Successful';
                echo "<script>window.location.href=('../client.php');</script>";
              }
              else
              {
                $_SESSION['message'] = 'Oops!!...Error...Something Went Wrong, try again';
                echo "<script>window.location='../templates/register-car.php';</script>";
              }   
        }
        else
        {
            $_SESSION['message'] = 'Car already exist';
            echo "<script>window.location='../templates/register-car.php';</script>";
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
}

?>