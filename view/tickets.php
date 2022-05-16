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
        <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
        <a href="tickets_create.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Submit a Ticket</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">All Tickets</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Ticket Number</th>
                            <th class="border-gray-200" scope="col">Date</th>
                            <th class="border-gray-200" scope="col">Department</th>
                            <th class="border-gray-200" scope="col">Title</th>
                            <th class="border-gray-200" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#39201</td>
                            <td>06/15/2021</td>
                            <td>IT Support</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-light text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#38594</td>
                            <td>05/15/2021</td>
                            <td>IT Support</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-primary text-white">In-Progress</span></td>
                        </tr>
                        <tr>
                            <td>#38223</td>
                            <td>04/15/2021</td>
                            <td>Housekeeping</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-success text-white">Done</span></td>
                        </tr>
                        <tr>
                            <td>#38125</td>
                            <td>03/15/2021</td>
                            <td>Maintenance</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-info text-white">Closed</span></td>
                        </tr>
                        <tr>
                            <td>#39201</td>
                            <td>06/15/2021</td>
                            <td>IT Support</td>
                            <td>$29.99</td>
                            <td><span class="badge bg-secondary text-light">Cancelled</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>

</div>
<!-- End of Main Content -->
<?php
require_once("../html/footer_tickets.php");
?>