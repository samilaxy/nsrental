<?php 
include_once('../../lib/Session.php');
 include "../inc/header.php"; 
 include '../../lib/Database.php';
 $db = new Database();
?>

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Register car</h2>
            <ol>

                <li>Register car</li>
            </ol>
        </div>

    </div>
</section>

<div class="container pt-5">
    <div class="col-md-12 col-sm-12 py-3">
        <div class="col-md-6 mx-auto  class=" pt-5"">
            <!-- <div>
                <?php if (isset($_SESSION['message'])){?>
                <div class="alert alert-block alert-danger"><?php echo $_SESSION['message'] ?></div>
                <?php  unset($_SESSION['message']);
        }?>
            </div> -->


            <?php
           $query = "SELECT * FROM `tbl_clients` WHERE `email` = '".$_SESSION["email"]."' ";
           $result = $db->select($query);
           $row = $result->fetch_assoc();
       
        ?>
            <form action="../controller/clientController.php" method="post" enctype="multipart/form-data">
                <div class="mb-3 ">
                    <label class="form-label">Car number</label>
                    <input type="text" class="form-control" name="carnumber" placeholder="Car number">
                </div>
                <input type="hidden" name="fullname" value="<?= $row['fullname'] ?>">
                <div class="mb-3">
                    <label class="form-label">Car name</label>
                    <input type="text" class="form-control" name="carname" placeholder="Car name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" class="form-control" name="model" placeholder="Model">
                </div>
                <div class="mb-3">
                    <label class="form-label">Car type</label>
                    <select name="carType" class="form-control">
                        <option selected>Choose...</option>
                        <option value="Saloon">Saloon</option>
                        <option value="4x4">4x4</option>
                        <option value="Van">Van</option>
                        <option value="Mini-Bus">Mini-Bus</option>
                        <option value="Bus">Bus</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Seat</label>
                    <input type="number" class="form-control" name="seatnumber" placeholder="Seat number">
                </div>
                <div class="mb-3">
                    <label class="form-label">Fuel type</label>
                    <select name="fueltype" class="form-control">
                        <option selected>Choose...</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price per/day</label>
                    <input type="text" class="form-control" name="price" placeholder="Price">
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label class="form-label">Details</label>
                        <textarea class="form-control" name="details" rows="5" data-rule="required"
                            data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <label class="form-label">Upload image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-info btn-sm" name="registercar">

                    Submit <i class="fa fa-check-circle"></i>
                </button>
            </form>
        </div>
    </div>


</div>

<?php include "../../inc/footer.php"; ?>