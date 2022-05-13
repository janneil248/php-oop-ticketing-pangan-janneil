<?php
require_once("../html/header.html")



?>

                <!-- Begin Page Content -->
                <form action="../controller/controller.php" method="post">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Create New User</h1>
                        </div>

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
                                            <input class="form-check-input" id="flexCheckSolidDefault" type="checkbox"  name="department[]" value="1">
                                            <label class="form-check-label" for="flexCheckSolidDefault">HR</label>
                                        </div>
                                        <div class="form-check form-check-solid">
                                            <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox" name="department[]" value ="2">
                                            <label class="form-check-label" for="flexCheckSolidChecked">IT</label>
                                        </div>
                                        <div class="form-check form-check-solid">
                                            <input class="form-check-input" id="flexCheckSolidDefault" type="checkbox"  name="department[]" value="3">
                                            <label class="form-check-label" for="flexCheckSolidDefault">Marketing</label>
                                        </div>
                                        <div class="form-check form-check-solid">
                                            <input class="form-check-input" id="flexCheckSolidChecked" type="checkbox"  name="department[]" value="4">
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
                                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="First Name" name="firstname" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="exampleFormControlInput2" type="text" placeholder="Last Name" name="lastname" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">Email</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="Ex: yourname@example.com" name="email" required>
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

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>