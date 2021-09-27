<?php $this->view('includes/header', $data); ?>
<?php $this->view('students/crs_sidebar', $data); ?>

<style type="text/css">
    @media only screen and (max-width: 500px) {
        #courseImage {width: 200px; height:200px}
        video {width: 200px; height:200px}
        audio {width: 200px; height:200px}
    }
</style>

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
                                <div class="card-title">
                                    <i class="fas fa-folder p-3"></i><?php if(!empty($data['rows'][0]->CrsCode)) echo($data['rows'][0]->CrsCode) ?> uploded files
                                </div>
                               
                            </div>
                        </div>

                        <div class="card-body">
                            <?php if(is_array($data['folder'])): 
                            if(count($data['folder']) <= 0):?>
                                <h2 class="text-warning"><b><i>Sorry, Nothing is uploaded yet!!!!!!</i></b></h2>
                            <?php else: $count = sizeof($data['folder']); ?>
                            <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist" aria-multiselectable="true">

                                <?php for($i = 0; $i < $count; $i++):
                                     $files1 = array();
                                     $files = scandir($data['folder_name'].'/'.$data['folders'][$i]);
                                     foreach ($files as $file) {
                                         if($file ==='.' or $file === '..') {
                                             continue;
                                         }else {
                                            array_push($files1 , $file);
                                         }
                                     }
                                ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="folder_collapse">
                                       
                                        <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapse79<?=$i?>"
                                            aria-expanded="true" aria-controls="collapse79<?=$i?>">
                                            <h5 class="mt-1 mb-0">
                                                <span><?= $data['folders'][$i]?></span>
                                                <i class="fas fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                   
                                    <div id="collapse79<?=$i?>" class="collapse" role="tabpanel" aria-labelledby="folder_collapse" data-parent="#accordionEx78">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div id="add-row_wrapper"  class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <?php foreach($data['rows'] as $row):
                                                                if($row-> folder == $data['folders'][$i]):
                                                                    if($row->FileName == ''): ?>
                                                                    <div class="jumbotron">
                                                                        <a type="button"  id="delete" data-id="<?= $row->ID ?>" class="btn btn-link float-right"  data-original-title="delete note">
                                                                            <i class="fas fa-pen-square text-danger "></i>
                                                                        </a>
                                                                        <a type="button"  id="update_txt" data-id="<?= $row->ID ?>" class="btn btn-link float-right" data-original-title="Edit note">
                                                                            <i class="fas fa-pen-square text-primary "></i>
                                                                        </a>
                                                                        <?php  echo($row->note);?>
                                                                    </div>
                                                                    <?php
                                                                        else:
                                                                            $extension = pathinfo($row->FileName, PATHINFO_EXTENSION);
                                                                            $imageextension = array("jpg", "jpeg", "gif", "png");
                                                                            $videoextension = array("mp4", "mpeg", "ogg", "avi", "mov");
                                                                            $audioextension = array("mp3", "wmv", "aac", "amr", "wav","m4a","flv");
                                                                            if(in_array($extension, $imageextension)):
                                                                        ?>
                                                                    <div class="jumbotron">
                                                                        <a type="button"  id="delete" data-id="<?= $row->ID ?>" class="btn btn-link float-right"  data-original-title="delete file">
                                                                            <i class="fas fa-pen-square text-danger "></i>
                                                                        </a>
                                                                        <a type="button"  id="update" data-id="<?= $row->ID ?>" class="btn btn-link float-right"  data-toggle="modal" href="#fileModal" data-original-title="Edit file">
                                                                            <i class="fas fa-pen-square text-primary "></i>
                                                                        </a>

                                                                        <img src="<?=ROOT.$data['folder_path'].'/'.$row->folder.'/'.$row -> FileName ?>"  id="courseImage" alt="..." style="width:300; height:300px">
                                                                        <br/><p><b><?php echo($row-> note); ?></b></p>
                                                                    </div>
                                                                        <?php elseif(in_array($extension, $videoextension)): ?>
                                                                    <div class="jumbotron">
                                                                        <a type="button"  id="delete" data-id="<?= $row->ID ?>" class="btn btn-link float-right"  data-original-title="delete note">
                                                                            <i class="fas fa-pen-square text-danger "></i>
                                                                        </a>
                                                                        <a type="button"  id="update" data-id="<?= $row->ID ?>" class="btn btn-link float-right"  data-toggle="modal" href="#fileModal" data-original-title="Edit note">
                                                                            <i class="fas fa-pen-square text-primary "></i>
                                                                        </a>
                                                                        <video width="400" height="400" controls>
                                                                            <source src="<?= ROOT.$data['folder_path'].'/'.$row->folder.'/'.$row -> FileName ?>" type="video/<?php echo $extension ?>">
                                                                        </video>
                                                                        <br/><p><b><?php echo($row-> note); ?></b></p>
                                                                    </div>
                                                                        <?php elseif(in_array($extension, $audioextension)): ?>
                                                                    <div class="jumbotron">
                                                                        <a type="button"  id="delete" data-id="<?= $row->ID ?>" class="btn btn-link float-right"  data-original-title="delete note">
                                                                            <i class="fas fa-pen-square text-danger "></i>
                                                                        </a>
                                                                        <a type="button"  id="update" data-id="<?= $row->ID ?>" class="btn btn-link float-right"  data-toggle="modal" href="#fileModal" data-original-title="Edit note">
                                                                            <i class="fas fa-pen-square text-primary "></i>
                                                                        </a>
                                                                        <audio controls>
                                                                            <source src="<?= ROOT.$data['folder_path'].'/'.$row->folder.'/'.$row -> FileName ?>" type="audio/<?php echo $extension ?>">
                                                                        </audio>
                                                                        <br/><p><b><?php echo($row-> note); ?></b></p>
                                                                    </div>
                                                                        <?php else: ?>
                                                                    <div class="jumbotron">

                                                                            <a type="button" href="<?= ROOT.$data['folder_path'].'/'.$row->folder.'/'.$row -> FileName ?>" class="btn btn-link btn-info btn-lg" data-original-title="Download file"> 
                                                                                <i class="fas fa-download"></i> <? echo $row -> FileName?>
                                                                            </a>
                                                                        <br/><p><b><?php echo($row-> note); ?></b></p>

                                                                    </div>

                                                                        <?php endif;  ?>
                                                            <?php
                                                                endif;
                                                                endif;
                                                            endforeach;
                                                            ?>

                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endfor;?>

                            </div>
                            <?php endif; ?>
                            <?php endif; ?>

                        </div>

                        <div class="card-footer">
                            <hr>

                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
    <?php $this->view('includes/footer'); ?>

    </body>

    </html>
    