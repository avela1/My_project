<?php $this->view('includes/header', $data); ?>
<?php $this->view('students/sidebar', $data); ?>

		<div class="main-panel">
            <div class="panel-header bg-primary-gradient ">
                <div class="page-inner">
                </div>
            </div>
            <div class="content ml-5 mr-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-pricing card-pricing-focus card-primary">
                            <div class="card-header">
                                <h4 class="card-title"><b> My Profile</b></h4>
                            </div>
                            <div class="card-body">
                                <ul class="specification-list">
                                    <li>
                                        <span class="name-specification">Full Name</span>
                                        <span class="status-specification"><?= $data['user_data'][0]->Name?></span>
                                    </li>
                                    <li>
                                        <span class="name-specification">Id No.</span>
                                        <span class="status-specification"><?= $data['user_data'][0]->Username?></span>
                                    </li>
                                    <li>
                                        <span class="name-specification">Email</span>
                                        <span class="status-specification"><?= $data['user_data'][0]->StudEmail?></span>
                                    </li>
                                    <li>
                                        <span class="name-specification">Departement</span>
                                        <span class="status-specification">Computer Science</span>
                                    </li>
                                    <li>
                                        <span class="name-specification">Year</span>
                                        <span class="status-specification"><?= $data['user_data'][0]->Batch?></span>
                                    </li>
                                  
                                </ul>
                            </div>
                           
                        </div>
                       
                    </div>
                    <div class="col-md-4">
                            <div class="card card-pricing card-pricing-focus card-primary">
                                <div class="card-header">
                                    <h4 class="card-title"><b> Profile Image</b></h4>
                                </div>
                                <div class="card-body">
                                    <img src="<?= ROOT.$data['user_data'][0]->Image?>" alt="..." style="width: 190px; height: 190px">
                                </div>
                           
                        </div>
               </div>
           </div>


</div>          
<?php $this->view('includes/footer'); ?>
</body>
</html>