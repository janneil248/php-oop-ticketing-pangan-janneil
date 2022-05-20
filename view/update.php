<?php
require_once("../includes/functions.php");

Opera::sessionStart();
Opera::roleAdmin();


$ticket_id = $_GET["ticket_id"];
$row = Opera::getSetTickets($ticket_id);

require_once("../html/header_dashboards.php")
?>

<!-- Begin Page Content -->
<form action="../controller/controller.php" method="post">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update A Ticket</h1>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Ticket Number</div>
                    <div class="card-body">
                        <label class="form-control"  id="postTitleInput"><?= $row->ticket_id ?></label>
                        <input type="hidden" name="ticket_id" value = "<?= $row->ticket_id ?>">
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Department</div>
                    <div class="card-body">
                    <label class="form-control"  id="postTitleInput"><?= Opera::getUsersGroups($row->group_id) ?></label>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Title</div>
                    <div class="card-body">
                    <label class="form-control"  id="postTitleInput"><?= $row->title ?></label>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Content</div>
                    <div class="card-body">
                    <label class="form-control"  id="postTitleInput"><?= $row->content?></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <div class="card mb-4">
                    <div class="card-header">Date</div>
                    <div class="card-body">
                    <label class="form-control"  id="postTitleInput"><?= $row->created_at ?></label>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Status</div>
                    <div class="card-body">
                        <select class="form-control" name="status">
                            <option value="Pending" <?php if( $row->status == "Pending"){echo 'selected';}?>>Pending</option>
                            <option value="In-Progress" <?php if( $row->status == "In-Progress"){echo 'selected';}?>>In-Progress</option>
                            <option value="Done" <?php if( $row->status == "Done"){echo 'selected';}?>>Done</option>
                            <option value="Closed" <?php if( $row->status == "Close"){echo 'selected';}?>>Closed</option>
                            <option value="Cancelled" <?php if( $row->status == "Cancelled"){echo 'selected';}?>>Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Actions</div>
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="fw-500 btn btn-primary col" name="update" value="update">Update Ticket</button>
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