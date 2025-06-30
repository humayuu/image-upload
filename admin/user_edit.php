<?php require 'header.php'; ?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage User</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-8">
                    <div class="card" style="height: 500px;">
                        <div class="card-body">

                            <h4 class="card-title">Edit User</h4>
                            <br>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Fullname</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Full Name" id="example-text-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="customFile" placeholder="User Email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="customFile" placeholder="Password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="customFile" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div style="margin-top: 50px">
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">
                                <a href=""
                                    class="btn btn-danger waves-effect waves-light">Cancel</a>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div>



        <?php require 'footer.php'; ?>