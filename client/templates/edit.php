<?php 
include_once('../../lib/Session.php');
 include "../inc/header.php"; 
 include '../../lib/Database.php';
 $id = htmlentities($_GET['id']);
 $db = new Database();


?>
<div class="container pt-5">
    <div class="col-md-12 col-sm-12 py-3">
        <div class="col-md-6 mx-auto  class=" pt-5"">
            <div>
                <?php if (isset($_SESSION['message'])){?>
                <div class="alert alert-block alert-danger"><?php echo $_SESSION['message'] ?></div>
                <?php  unset($_SESSION['message']);
        }?>
            </div>

<?php 
       $query = "SELECT * FROM tbl_register_car WHERE id  '".$id."'";
       $result = $db->select($query);
?>
            <form action="../controller/clientController.php?id=<?php echo $id ?>" method="post">
                <?php while ($row = $result->fetch_assoc()) {?>
               
                <div class="mb-3 ">
                    <label class="form-label">Car number</label>
                    <input type="text" class="form-control" name="carnumber" value="<?php echo $row['carnumber'];?>">
                </div>
               
                <?php } ?>
            </form>
        </div>
    </div>


</div>

<?php include "../inc/footer.php"; ?>