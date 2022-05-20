<?php
require_once("../includes/functions.php");

Opera::sessionStart();
Opera::roleAccess();

$user_id = $_SESSION["user_id"];
$ticketStatus = Opera::selectTicketsStatus($user_id);
$ticketpercentage = Opera::getGroupPercentage();

require_once("../html/header_dashboards.php");

?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ticketStatus[0]?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                In Progress</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ticketStatus[1]?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Done
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $ticketStatus[2]?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Cancelled</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ticketStatus[4]?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-trash fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tickets</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">HR<span class="float-right"><?= $ticketpercentage[0]."%"?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $ticketpercentage[0]."%"?>" aria-valuenow="<?= $ticketpercentage[0]?>" aria-valuemin="<?= 100 - $ticketpercentage[0]?>" aria-valuemax="100"></div>
                    </div>

                    <h4 class="small font-weight-bold">IT<span class="float-right"><?= $ticketpercentage[1]."%"?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: <?= $ticketpercentage[1]."%"?>" aria-valuenow="<?= $ticketpercentage[1]?>" aria-valuemin="<?= 100 - $ticketpercentage[0]?>" aria-valuemax="100"></div>
                    </div> 

                    <h4 class="small font-weight-bold">Marketing<span class="float-right"><?= $ticketpercentage[2]."%"?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $ticketpercentage[2]."%"?>" aria-valuenow="<?= $ticketpercentage[2]?>" aria-valuemin="<?= 100 - $ticketpercentage[0]?>" aria-valuemax="100"></div>
                    </div>

                    <h4 class="small font-weight-bold">Maintenance<span class="float-right"><?= $ticketpercentage[3]."%"?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: <?= $ticketpercentage[3]."%"?>" aria-valuenow="<?= $ticketpercentage[3]?>" aria-valuemin="<?= 100 - $ticketpercentage[0]?>" aria-valuemax="100"></div>
                    </div>

                    <h4 class="small font-weight-bold">Housekeeping<span class="float-right"><?= $ticketpercentage[4]."%"?></span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $ticketpercentage[4]."%"?>" aria-valuenow="<?= $ticketpercentage[4]?>" aria-valuemin="<?= 100 - $ticketpercentage[0]?>" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="../img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
require_once("../html/footer_dashboards.php");
?>