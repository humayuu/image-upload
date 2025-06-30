<?php require 'header.php'; ?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Product</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl no</th>
                                            <th>Image </th>
                                            <th>Product En</th>
                                            <th>Product Price </th>
                                            <th>Quantity </th>
                                            <th>Discount </th>
                                            <th>Status </th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>dasds</td>
                                            <td>dasds</td>
                                            <td>sdasd</td>
                                            <td>sdasd</td>
                                            <td>sdasd</td>
                                            <td>sdasd</td>
                                            <td>
                                                <a href="" class="btn btn-danger sm"
                                                    title="Delete Invoice" id="delete"> <i class="fa fa-arrow-down"></i>  </a>
                                                <a href="" class="btn btn-primary sm"
                                                    title="Delete Invoice" id="delete"> <i class="fa fa-arrow-up"></i>  </a>
                                                <a href="" class="btn btn-info sm"
                                                    title="Edit Invoice"> <i class="fas fa-edit"></i> </a>
                                                <a href="" class="btn btn-danger sm"
                                                    title="Delete Invoice" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                                                <a href="" class="btn btn-warning sm"
                                                    title="Delete Invoice" id="delete"> <i class="fa fa-eye"></i> </a>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->


        </div>



        <?php require 'footer.php'; ?>