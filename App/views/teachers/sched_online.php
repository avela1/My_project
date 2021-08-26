<?php $this->view('includes/header', $data); ?>
<?php $this->view('teachers/sidebar', $data); ?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Online Lectures</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Scheduled class</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">List</a
                    </li>
                </ul>
			</div>
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="card-title">Scheduled Online Lectures</div>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fas fa-upload"></i>
                                Schedule New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary card-annoucement card-round">
                        <div class="card-body text-center">
                            <div class="card-opening">Course Name</div>
                            <div class="card-desc">
                               Online lecturing schedule time and its descryption information
                            </div>
                            <div class="card-detail">
                                <div class="btn btn-light btn-rounded">View Detail</div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="card card-primary card-annoucement card-round">
                        <div class="card-body text-center">
                            <div class="card-opening">Course Name</div>
                            <div class="card-desc">
                               Online lecturing schedule time and its descryption information
                            </div>
                            <div class="card-detail">
                                <div class="btn btn-light btn-rounded">View Detail</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary card-annoucement card-round">
                        <div class="card-body text-center">
                            <div class="card-opening">Course Name</div>
                            <div class="card-desc">
                               Online lecturing schedule time and its descryption information
                            </div>
                            <div class="card-detail">
                                <div class="btn btn-light btn-rounded">View Detail</div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div> 
        </div>
    </div>
                                    


<?php $this->view('includes/footer'); ?>

</body>
</html>