<?php
require_once("../includes/functions.php");

Opera::sessionStart();
Opera::roleAccess();

require_once("../html/header_dashboards.php")
?>

<!-- Begin Page Content -->
<form action="../controller/controller.php" method="post">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Submit A Ticket</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Department</div>
                    <div class="card-body">
                        <select class="form-control" name="group_id">
                            <option value="1">HR</option>
                            <option value="2">IT</option>
                            <option value="3">Marketing</option>
                            <option value="4">Maintenance</option>
                            <option value="5">HouseKeeping</option>
                        </select>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Title</div>
                    <div class="card-body">
                        <input class="form-control" id="postTitleInput" type="text" placeholder="Ticket Title" name="title" required>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Content</div>
                    <div class="card-body">
                        <textarea class="lh-base form-control" type="text" placeholder="Ticket Content" rows="4" name="content" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="fw-500 btn btn-primary col" name="submit_ticket" value="submit_ticket">Submit Ticket</button>
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