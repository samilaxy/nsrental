<?php
include_once('../../lib/Database.php');
class ClientValidation{


  public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
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

}

// $fm = new Format();
// $fm->reportDateExist('2019-30-01');
// $fm->periodicDateExist('2019-30-01','2019-27-01');
?>
