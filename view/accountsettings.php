<?php
require_once("../includes/functions.php");

Opera::sessionStart();
Opera::roleAccess();

$user_id = $_SESSION["user_id"];
$userinfo = Opera::showAccountInfo($user_id);
$group = Opera::checkGroup($user_id);


require_once("../html/header_dashboards.php")

?>

<!-- Begin Page Content -->
<form action="../controller/controller.php" method="post">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <a class="	fa fa-chevron-left" aria-hidden="true" href="index.php"></a>
            &nbsp; &nbsp;
            <h1 class="h3 mb-0 text-gray-800">Account Settings</h1>
        </div>
        <?php if (isset($_GET["success"])) { ?>
            <div class="px-3 py-2 bg-gradient-success text-white">
                <?php echo $_GET["success"] ?>
            </div>
        <?php } ?>
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
                <?php if ($_SESSION["role"] == "Admin") { ?>
                    <div class="card mb-4">
                        <div class="card-header">Role</div>
                        <div class="card-body">
                            <select class="form-control" name="role">
                                <option value="2" <?php if ($userinfo->role_id == "2") {
                                                        echo ' selected';
                                                    } ?>>User</option>
                                <option value="1" <?php if ($userinfo->role_id == "1") {
                                                        echo ' selected';
                                                    } ?>>Admin</option>
                            </select>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="card mb-4">
                        <div class="card-header">Role</div>
                        <div class="card-body">
                            <label class="form-control" id="postTitleInput" type="text"><?= Opera::roleAssign($userinfo->role_id) ?></label>
                            <input type="hidden" value="<?=$userinfo->role_id?>" name="role">
                        </div>
                    </div>

                <?php } ?>
                <?php if ($_SESSION["role"] == "Admin") { ?>
                    <div class="card mb-4">
                        <div class="card-header">Department</div>
                        <div class="card-body">
                            <div class="form-check form-check-solid">
                                <input class="form-check-input" id="flexCheckSolidDefault" type="checkbox" name="department[]" value="1" <?php if (in_array(1, $group)) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckSolidDefault">HR</label>
                            </div>
                            <div class="form-check form-check-solid">
                                <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox" name="department[]" value="2" <?php if (in_array(2, $group)) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckSolidChecked">IT</label>
                            </div>
                            <div class="form-check form-check-solid">
                                <input class="form-check-input" id="flexCheckSolidDefault" type="checkbox" name="department[]" value="3" <?php if (in_array(3, $group)) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckSolidDefault">Marketing</label>
                            </div>
                            <div class="form-check form-check-solid">
                                <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox" name="department[]" value="4" <?php if (in_array(4, $group)) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckSolidChecked">Maintenance</label>
                            </div>
                            <div class="form-check form-check-solid">
                                <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox" name="department[]" value="5" <?php if (in_array(5, $group)) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                <label class="form-check-label" for="flexCheckSolidChecked">Housekeeping</label>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="card mb-4">
                        <div class="card-header">Department</div>
                        <div class="card-body">
                            <?php foreach ($group as $dept) { ?>
                                <label class="form-check-label" for="flexCheckSolidChecked"><?= Opera::getUsersGroups($dept); ?></label><br>
                                <input type="hidden" name="department[]" value="<?= $dept ?>;">
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>
                <div class="card mb-4">
                    <div class="card-header">Name</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="First Name" name="firstname" value="<?= $userinfo->first_name ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput2" type="text" placeholder="Last Name" name="lastname" value="<?= $userinfo->last_name ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Email</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="Ex: yourname@example.com" name="email" value="<?= $userinfo->email ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput2" type="email" placeholder="Retype Email" name="emailvalidation" value="<?= $userinfo->email ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Password</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput1" type="password" placeholder="Your Password" name="password">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" id="exampleFormControlInput2" type="password" placeholder="Retype Password" name="passwordvalidation">
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
                            <button type="submit" name="update_user" value="update_user" class="fw-500 btn btn-primary col">Save Profile</button>
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