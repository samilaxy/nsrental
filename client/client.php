<?php 
include_once('../lib/Session.php');
include '../lib/Database.php';
$db = new Database();

$query = "SELECT * FROM `tbl_clients` WHERE `email` = '".$_SESSION["email"]."' ";
$result = $db->select($query);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>NS-Rentals</title>
    <meta content="" name="description">
    <meta content="" name="keywords">



    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../stylesheet/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../stylesheet/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../stylesheet/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../stylesheet/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../stylesheet/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../stylesheet/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../stylesheet/vendor/owl.carousel/stylesheet/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../stylesheet/css/style.css" rel="stylesheet">
</head>



<?php 

$query1 = "SELECT id FROM `tbl_clients` WHERE `email` = '".$_SESSION["email"]."' ";
$result1 = $db->select($query1);
$row1 = $result1->fetch_assoc();


// $query2 = "SELECT car.* , client.* FROM tbl_register_car car, tbl_clients client WHERE car.cid = '".$row1['id']."'";
$query2 = "SELECT * FROM tbl_register_car  WHERE client = '".$row1['fullname']."'";
$result2 = $db->select($query2);

?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo"><a href="#">NS-Rentals</a></h1>


        <nav class="nav-menu d-none d-lg-block">

            <ul>
                <li class="active"><a href="clientgarage.php">Home</a></li>

                <li><a href="templates/register-car.php">Register car</a></li>
                <li><a href="client.php">My cars</a></li>


            </ul>
        </nav>
        <a href="../lib/logout.php" class="get-started-btn ml-auto">Logout</a>

        <span class="ml-3"><?php echo $row['fullname']; ?></span>

    </div>
</header>



<body>
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Dashboard</h2>
                <ol>

                    <li>Dashboard</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="services" class="services">
        <div class="col-md-12 col-sm-12  py-3">

          
    <div class="container-fluid">
    <div class="row">
        <?php  while ($row2 = $result2->fetch_assoc()){ ?>


           
                <div class="col-md-3 p-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row2['carname']?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $row2['carnumber']?></h6>
                            <p class="card-text"><?= $row2['details']?></p>
                            <a href="#=<?= $row2['id'] ?>" class="card-link">View</a>
                            <a href="#=<?= $row2['id'] ?>" class="Edit">Edit</a>
                            <span><?= $row2['id'] ?></span>
                            <span><?= $row2['client'] ?></span>
                        </div>
                    </div>
                </div>
                <?php   } ?>
            </div>
            </div>

         
        </div>

    </section>
</body>

<?php include "/inc/footer.php"; ?>