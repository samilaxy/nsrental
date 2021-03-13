<?php include "../../inc/header.php"; ?>

<div class="container">
<div class="col-md-12 col-sm-12 py-3">
    <div class="col-md-6 mx-auto">
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Car number</label>
            <input type="text" class="form-control" name="carnumber" placeholder="Car number">
        </div>
        <div class="mb-3">
            <label class="form-label">Model</label>
            <input type="text" class="form-control" name="email" placeholder="Model">
        </div>
        <div class="mb-3">
            <label class="form-label">Prce</label>
            <input type="text" class="form-control" name="price" placeholder="Price">
        </div>
        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-control">
                                <option selected>Choose...</option>
                                <option value="Saloon">Saloon</option>
                                <option value="4x4">4x4</option>
                                <option value="Van">Van</option>
                                <option value="Mini-Bus">Mini-Bus</option>
                                <option value="Bus">Bus</option>
                            </select>
                        </div>
                        <div class="mb-3">
            <label class="form-label">Upload image</label>
            <input type="file" class="form-control" name="image"  >
        </div>
        <button type="submit" class="btn btn-info btn-sm" name="register">
       
            Submit <i class="fa fa-check-circle"></i>
        </button>
    </form>
    </div>
</div>


</div>

<?php include "../../inc/footer.php"; ?>