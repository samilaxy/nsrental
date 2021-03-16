<?php
include_once('../lib/Database.php');
class Format{


  public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    //check password match
  public function passwordMatch($pw1, $pw2){
    if ($pw1 == $pw2) {
      return true;
    }else{
      return false;
    }
  }

//validate email
  public function isValidEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    }else{
      return false;
    }
  }

//check if email exist
  public function MailExist($email){
    $db = new Database();  //db instance
    $mail_Query = "SELECT phone FROM acnt_tbl WHERE email = '$email'";
    $MailExist = $db->select($mail_Query);
    if (!$MailExist) {
        return true;
    }else{
      return false;
    }
  }
  //check if car number exist
  public function carExist($carnumber){
    $db = new Database();  //db instance
    $carnumber_query = "SELECT carnumber FROM tbl_register_car WHERE carnumber = '$carnumber'";
    $result = $db->select($carnumber_query);
    if ($result) {
        return true;
    }else{
      return false;
    }
  }

//check if email exist
  public function UserEmailExist($email){
    $db = new Database();  //db instance
    $mail_Query = "SELECT * FROM user_tbl WHERE email = '$email'";
    $MailExist = $db->select($mail_Query);
    if (!$MailExist) {
        return true;
    }else{
      return false;
    }
  }

//check if brand name exist
    public function brandExist($brandName){
    $db = new Database();  //db instance
    $brand_Query = "SELECT bid FROM brand_tbl WHERE brand_name = '$brandName'";
    $brandExist = $db->select($brand_Query);
    if (!$brandExist) {
        return true;
    }else{
      return false;
    }
  }


  //checking if category name exist
  public function cateExist($catName){
    $db = new Database();
    $catQuery = "SELECT cid FROM category_tbl WHERE category_name = '$catName'";
    $catExist = $db->select($catQuery);
    if (!$catExist) {
          return true;
    }else{
      return false;
    }
  }

  //checking if product name exist
  public function prdtNameExist($prdtName){
    $db = new Database();
    $pdrtQuery = "SELECT pid FROM product_tbl WHERE prdt_name = '$prdtName'";
    $prdtExist = $db->select($pdrtQuery);
    if (!$prdtExist) {
          return true;
    }else{
      return false;
    }
  }

  //check if the selected date exist
  public function reportDateExist($reportDate){
    $db = new Database();  //db instance
    $reptDate = "SELECT * FROM `invoice` WHERE `order_date` = '$reportDate'";
    $reportdt = $db->select($reptDate);
    if ($reportdt) {
     //  echo "OK";
          return true;
    }else{
       //echo "NOT OK";
      return false;
    }
  }

  public function periodicDateExist($_rdate_from,$_rdate_to){
    $db = new Database();  //db instance
    $_reptDate = "SELECT * FROM `invoice` where `order_date` >= '$_rdate_from' || '$_rdate_to' <= `order_date`";
    $_reportdt = $db->select($_reptDate);
    if ($_reportdt) {
     //  echo "OK";
          return true;
    }else{
     //  echo "NOT OK";
      return false;
    }
  }
}

// $fm = new Format();
// $fm->reportDateExist('2019-30-01');
// $fm->periodicDateExist('2019-30-01','2019-27-01');
?>
