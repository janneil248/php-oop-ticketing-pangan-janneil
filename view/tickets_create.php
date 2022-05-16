<?php
require_once("../includes/functions.php");
Opera::sessionStart();
Opera::roleAccess();



require_once("../html/header_tickets.php")
?>

<!-- Begin Page Content -->
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
                    <select class="form-control">
                        <option value="Housekeeping">Housekeeping</option>
                        <option value="HR">HR</option>
                        <option value="IT Support">IT Support</option>
                        <option value="Maintenance">Maintenance</option>
                    </select>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Title</div>
                <div class="card-body">
                    <input class="form-control" id="postTitleInput" type="text" placeholder="Ticket Title">
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">Content</div>
                <div class="card-body">
                    <textarea class="lh-base form-control" type="text" placeholder="Ticket Content" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Actions</div>
                <div class="card-body">
                    <div class="d-grid">
                        <button class="fw-500 btn btn-primary col">Submit Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once("../html/footer_tickets.php");
?>