<?php
require_once("../includes/functions.php");

Opera::sessionStart();
Opera::roleAccess();
$user_id = $_SESSION["user_id"];
$settings = Opera::showSettings($user_id);

require_once("../html/header_dashboards.php")
?>

<!-- Begin Page Content -->
<form action="../controller/controller.php" method="post">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Settings</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <?php if ($_SESSION["role"] == "Admin") { ?>
                    <div class="card mb-4">
                        <div class="card-header">Web Site Name</div>
                        <div class="card-body">
                            <input class="form-control" id="postTitleInput" type="text" value="<?= $settings->web_name ?>" name="web_name" required>
                        </div>
                    </div>
                <?php } ?>
                <div class="card mb-4">
                    <div class="card-header">Page Settings</div>
                    <div class="card-body">
                        <select class="form-control" name="page">
                            <option value="5" <?php if ($settings->page == "5") {
                                                    echo ' selected';
                                                } ?>>5</option>
                            <option value="10" <?php if ($settings->page == "10") {
                                                    echo ' selected';
                                                } ?>>10</option>
                            <option value="15" <?php if ($settings->page == "15") {
                                                    echo ' selected';
                                                } ?>>15</option>
                            <option value="20" <?php if ($settings->page == "20") {
                                                    echo ' selected';
                                                } ?>>20</option>
                        </select>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Page Settings</div>
                    <div class="card-body">
                        <select class="form-control" name="language">
                            <option value="EN" <?php if ($settings->language == "EN") {
                                                    echo ' selected';
                                                } ?>>English</option>
                            <option value="TL" <?php if ($settings->language == "TL") {
                                                    echo ' selected';
                                                } ?>>Filipino</option>
                            <option value="IT" <?php if ($settings->language == "IT") {
                                                    echo ' selected';
                                                } ?>>Italian</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="fw-500 btn btn-primary col" name="page_settings" value="page_settings">Save Settings</button>
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