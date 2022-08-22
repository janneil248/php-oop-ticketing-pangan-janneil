<?php
require_once("../includes/functions.php");

Opera::sessionStart();
Opera::roleAdmin();

require_once("../html/header_dashboards.php")

?>

<!-- Begin Page Content -->
<form action="../controller/controller.php" method="post">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <a class="	fa fa-chevron-left" aria-hidden="true" href="users.php"></a>
            &nbsp; &nbsp;
            <h1 class="h3 mb-0 text-gray-800">Create New User</h1>
        </div>

        <?php if (isset($_SESSION["errors"])) { ?>
            <div class="px-3 py-3 bg-gradient-danger text-white">
                <ul>
                    <?php foreach ($_SESSION["errors"] as $errors) {  ?>
                        <li><?= $errors ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>


        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Role</div>
                    <div class="card-body">
                        <select class="form-control" name="role">
                            <option value="2">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Department</div>
                    <div class="card-body">
                        <div class="form-check form-check-solid">
                            <input class="form-check-input" id="flexCheckSolidDefault" type="checkbox" name="department[]" value="1">
                            <label class="form-check-label" for="flexCheckSolidDefault">HR</label>
                        </div>
                        <div class="form-check form-check-solid">
                            <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox" name="department[]" value="2">
                            <label class="form-check-label" for="flexCheckSolidChecked">IT</label>
                        </div>
                        <div class="form-check form-check-solid">
                            <input class="form-check-input" id="flexCheckSolidDefault" type="checkbox" name="department[]" value="3">
                            <label class="form-check-label" for="flexCheckSolidDefault">Marketing</label>
                        </div>
                        <div class="form-check form-check-solid">
                            <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox" name="department[]" value="4">
                            <label class="form-check-label" for="flexCheckSolidChecked">Maintenance</label>
                        </div>
                        <div class="form-check form-check-solid">
                            <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox" name="department[]" value="5">
                            <label class="form-check-label" for="flexCheckSolidChecked">Housekeeping</label>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="First Name" name="firstname" value="<?php echo $_GET['fname'] ?? "" ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput2" type="text" placeholder="Last Name" name="lastname" value="<?php echo $_GET['lname'] ?? "" ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Email</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="Ex: yourname@example.com" name="email" value="<?php echo $_GET['email'] ?? "" ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput2" type="email" placeholder="Retype Email" name="emailvalidation" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Password</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="password" placeholder="Your Password" name="password" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput2" type="password" placeholder="Retype Password" name="passwordvalidation" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" name="admin_create_user" value="admin_create_user" class="fw-500 btn btn-primary col">Create User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require_once("../html/footer.php");
?>