<?php include "../inc/header.php"; ?>

<div class="container">
<div class="col-md-12 col-sm-12 py-3">
    <div class="col-md-6 mx-auto">
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
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
    </form>
    </div>
</div>


</div>

<?php include "../inc/footer.php"; ?>