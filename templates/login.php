<?php include "../inc/header.php"; ?>
<?php session_start(); ?>


<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Log in</h2>
          <ol>
             
            <li>Log in</li>
          </ol>
        </div>

      </div>
    </section>

<div class="container pt-5 mb-5">
<div class="col-md-12 col-sm-12 py-3">
    <div class="col-md-6 mx-auto">
    <form action="../controller/appController.php" method="post">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email address">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-info btn-sm" name="login">
            Login <i class="fa fa-check-circle"></i>
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