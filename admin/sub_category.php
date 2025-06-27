<?php require 'header.php'; ?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Sub-Category</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>dasds</td>
                                            <td>dasds</td>
                                            <td>
                                                <a href="" class="btn btn-info sm"
                                                    title="Edit Invoice"> <i class="fas fa-edit"></i> </a>
                                                <a href="" class="btn btn-danger sm"
                                                    title="Delete Invoice" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card" style="height: 300px;">
                        <div class="card-body">

                            <h4 class="card-title">Add SubCategory</h4>
                            <br>
                           <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    </select>
                                            </div>
                                        </div>
                            <div class="row mb-5">
                                <label for="example-text-input" class="col-sm-2 col-form-label">SubCategory</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="SubCategory name" id="example-text-input">
                                </div>
                            </div>
                            <div style="margin-top: 50px">
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add">
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