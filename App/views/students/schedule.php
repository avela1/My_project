<?php $this->view('includes/header', $data); ?>
<?php $this->view('students/crs_sidebar', $data); ?>

<style>
    .dropdown-menu {
        overflow: auto ;
    }
   
</style>

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
                        <a href="#">List</a>
                    </li>
                </ul>
			</div>
            <div class="row">
                <?php if(is_array($data['rows'])): ?>
                    <?php foreach($data['rows'] as $row):?>
                <div class="col-md-6">
                    <div class="card card-primary card-annoucement card-round">
                        <div class="card-body text-center">
                            <div class="card-opening"><?= $row -> crs_id;?></div>
                            <div class="card-desc">
                            <?= $row -> class_desc;?>
                            </div>
                            <p> <?php echo date("D M j, G:i:s", strtotime($row -> start_time))?> - <?php echo date("D M j, G:i:s", strtotime($row -> end_time))?></p>
                            <div class="card-detail">
                                <a class="btn btn-light btn-rounded" href="<?= $row -> class_url;?>"> Join class</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php endforeach; else:?>
                    <h2 class="text-warning">There is no any scheduled classes yet.</h2>
                <?php endif; ?> 
            </div> 
        </div>
    </div>
                                    


<?php $this->view('includes/footer'); ?>



</body>
</html>