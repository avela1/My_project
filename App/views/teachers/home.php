<?php $this->view('includes/header', $data); ?>
<?php $this->view('teachers/sidebar', $data); ?>


<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Home Page</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="card-title">Course Name -> Uploaded Course Materials</div>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fas fa-upload"></i>
                                    Upload New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table display table-striped table-hover table-head-bg-danger mt-4 table-responsive">
                                <thead>
                                    <tr>
                                        <th style="width: 15%"><span class="h2 b">Description</span></th>
                                        <th><span class="h2 b">File</span></th>
                                        <th style="width: 10%"><span class="h2 b ml-3">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="h4">Chapter 1</span>
                                        </td>
                                        <td><span class="h4">This is where the file is putted</span></td>
                                        <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Download">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <hr>
                            Card Footer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->view('includes/footer'); ?>
</body>
</html>

