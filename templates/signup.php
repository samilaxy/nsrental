<?php session_start(); ?>
<?php include "../inc/header.php"; ?>


<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Sign up</h2>
          <ol>
             
            <li>Sign up</li>
          </ol>
        </div>

      </div>
    </section>

<div class="container">
    <div class="col-md-12 col-sm-12">

        <div class="col-md-6 mx-auto my-5 ">

            <form action="../controller/appController.php" method="post">

                <div class="mb-3 pt-5">
                    <label class="form- label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" placeholder="full name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email address">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="telephone" class="form-control" name="phone" placeholder="Mobile number">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password1" placeholder="Password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                </div>

                <button type="submit" class="btn btn-info btn-sm" name="register">
                    Submit <i class="fa fa-check-circle"></i>
                </button>
                <button type="reset" class="btn btn-secondary btn-sm">Clear</button>
            </form>

            <?php if (isset($_SESSION['message'])){?>
            <div class="alert alert-block alert-danger"><?php echo $_SESSION['message'] ?></div>
            <?php  unset($_SESSION['message']);
        }?>
        </div>
    </div>


</div>

<?php include "../inc/footer.php"; ?>