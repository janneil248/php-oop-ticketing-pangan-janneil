<?php
require_once("../includes/functions.php");
require_once("../model/ticket_class.php");

Opera::sessionStart();
Opera::roleAccess();


$user_id = $_SESSION["user_id"];
$tickets = Opera::showTickets($user_id);
require_once("../html/header_tickets.php")
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
        <a href="tickets_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Submit a Ticket</a>
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
                    <?php foreach ($tickets as $ticket) { ?>
                        <tr>
                        <td><?= $ticket["ticket_id"]; ?></td>
                        <td><?= $ticket["created_at"]; ?></td>
                        <td><?= Opera::getUsersGroups($ticket["group_id"]); ?></td>
                        <td><?= $ticket["title"]; ?></td>
                        <td><?= Opera::getTicketStatus($ticket["status"]); ?></td>
                        </tr>
                    <?php } ?>
                   
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
require_once("../html/footer.php");
?>