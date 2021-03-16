<?php
session_start();
if(!isset($_SESSION["email"])){
  header("location:../templates/login.php");
}
  $sesssion_id = $_SESSION['email'];
?>
