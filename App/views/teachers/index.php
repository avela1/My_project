<?php $this->view('includes/header', $data); ?>

		<div class="main-panel">
            <div class="panel-header bg-primary-gradient mt-5">
                <div class="page-inner py-5 mt-5">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h2 class="text-white pb-2 fw-bold"> <?php  echo($_SESSION['userrole']) ?> </h2>
                            <h5 class="text-white op-7 mb-2"> Welcome back -> <?php  echo $data['user_data'][0] -> Name ?></h5>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="content bg-white mt-4">
                <div class="row pt-3 pl-3">
                <?php if(is_array($data['rows'])): ?>
                    <?php foreach($data['rows'] as $row):?>
                    <div class="col-md-3" >
                        <div class="card card-post card-round bg-dark" >
                            <img class="card-img-top" src="<?= ROOT.$row -> CourseImage ?>" style="height: 200px;" alt="Card image cap">
                            <div class="card-body">
                                <div class="separator-solid"></div>
                                <h3 class="card-title"> 
                                    <a href="#">
                                    <?= $row -> CourseName;?> (<?= $row -> CourseCode;?>)
                                    </a>
                                </h3>
                                <div class="separator-solid"></div>
                                <!-- <p class="card-text">  <?= $row -> CourseDescription; ?></p> -->
                                <a href="<?= ROOT ?>teacher/dashboard?data-id=<?= $row -> CourseCode ?>" class="btn btn-primary btn-rounded btn-sm" data-id="<?= $row -> CourseCode ?>">Manage</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>

                    <?php endif; ?>

                    
           </div>
          
        <?php $this->view('includes/footer'); ?>
        <script>
            $(document).ready(function() {
                $('#wrapper').addClass('sidebar_minimize');
            });
        </script>
</body>
</html>

