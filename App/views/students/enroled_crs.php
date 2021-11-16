<?php $this->view('includes/header', $data); ?>
<?php $this->view('students/sidebar', $data); ?>


    <div class="main-panel">
        <div class="panel-header bg-primary-gradient mt-5">
            <div class="page-inner py-3 mt-3">
            </div>
        </div>
        <div class="content bg-white mt-4">
            <div class="row pt-3 pl-3">
            <?php if(is_array($data['rows']) && !empty($data['rows'])): ?>
                <?php foreach($data['rows'] as $row):?>
                <div class="col-md-3 d-flex align-items-stretch" >
                    <div class="card card-post card-round bg-dark" >
                        <img class="card-img-top" src="<?= ROOT.$row -> CourseImage ?>" style="height: 100px;" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title text-white" style="text-align:center;font-size:13px"> 
                                <?= $row -> CourseName;?> (<?= $row -> CourseCode;?>)
                            </h3>
                            <div class="separator-solid"></div>
                            <p class="text-white" style="text-align:center;font-size:10px"> 
                                <?= $row -> CourseDescription;?> 
                            </p>
                            <a href="<?= ROOT ?>student/course_mat?data-id=<?= $row -> CourseCode?>" class="btn btn-primary btn-rounded btn-sm mt-auto " data-id="<?= $row -> CourseCode ?>">Access</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>

                <?php endif; ?>
        </div>
<?php $this->view('includes/footer'); ?>

</body>

</html>