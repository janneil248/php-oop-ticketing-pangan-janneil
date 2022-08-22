<?php
require_once("../includes/functions.php");

Opera::sessionStart();
Opera::roleAdmin();

$user_id = $_SESSION["user_id"];
$users = Opera::showUsers($user_id);
$count = Opera::showAllUsers($user_id)->rowcount();
$pagination= Opera::pagination($user_id,$count);

require_once("../html/header_dashboards.php")
?>



<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="users_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Create New User</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">All Users</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">User</th>
                            <th class="border-gray-200" scope="col">Email</th>
                            <th class="border-gray-200" scope="col">Role</th>
                            <th class="border-gray-200" scope="col">Groups</th>
                            <th class="border-gray-200" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?= $user["first_name"] . " " . $user["last_name"]; ?></td>
                                <td><?= $user["email"]; ?></td>
                                <td><?= Opera::roleAssign($user["role_id"]) ?></td>
                                <td>
                                    <?php
                                    $usersgroups = Opera::selectUsersGroups();

                                    foreach ($usersgroups as $usergroup) {
                                        if ($usergroup["user_id"] == $user["user_id"]) {
                                            echo Opera::getUsersGroups($usergroup["group_id"]);
                                     
                                        } 
                                    } ?>
                                </td>
                                <td><span class="badge bg-success text-dark"><?= $user["status"]; ?></span></td>
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
    <li class="page-item">
            <a class="page-link" href="../view/users.php?page=<?= $pagination[0]?>">Previous</a>
        </li>
        <?php for ($i = 1; $i <= $pagination[2]; $i++) : ?>
            <li class="page-item"><a class="page-link" href="../view/users.php?page=<?= $i; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
        <li class="page-item">
        <a class="page-link" href="../view/users.php?page=<?= $pagination[1]?>">Next</a>
        </li>
    </ul>
</nav>

</div>
<!-- End of Main Content -->
<?php
require_once("../html/footer.php");
?>