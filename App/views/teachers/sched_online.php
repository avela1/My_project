<?php $this->view('includes/header', $data); ?>
<?php $this->view('teachers/sidebar', $data); ?>
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
                <div class="card col-md-12">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="card-title">Scheduled Online Lectures</div>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" id="schedule_btn" data-target="#schedule_class">
                                <i class="fas fa-upload"></i>
                                Schedule New
                            </a>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="schedule_class" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                    Schedule </span> 
                                    <span class="fw-light">
                                    Online Lecture
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="" id="addform" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="name">Course Code</label>
                                                <input id="crs_id" name="crs_id" type="text" class="form-control" disabled >
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title of Schedule" >
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Class Link</label>
                                                <input type="text" name="link" class="form-control" id="link" placeholder="Enter Link of Scheduled class" >
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Date and Start Time</label>
                                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                    <input type="text" id="start_time" name="start_time" class="form-control datetimepicker-input" data-target="#datetimepicker1" />
                                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="text">Start Date and Time</label>
                                                <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                                    <input type="text"  id="end_time" name="end_time" class="form-control datetimepicker-input" data-target="#datetimepicker2" />
                                                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="uploadFile" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
                                <a class="btn btn-light btn-rounded" href="<?= $row -> class_url;?>"> Start Online class</a>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php endforeach; else:?>
                    <h2 class="text-warning">You haven't Schedule anything yet</h2>
                <?php endif; ?> 
            </div> 
        </div>
    </div>
                                    


<?php $this->view('includes/footer'); ?>
<script>
    
$(document).ready(function() {
    $(document).on('click', '#schedule_btn', function() {
        var name1 = $(this).data('name');
        $("#crs_id").val("<?php echo($_SESSION['crs_id']); ?>");
    }); 

    $(document).on('submit', '#schedule_class', function(event) {
        event.preventDefault();
        $data = new FormData();
        $data.append("crs_id", $("#crs_id").val());
        $data.append("title", $("#title").val());
        $data.append("link", $("#link").val());
        $data.append("start_time", $("#start_time").val());
        $data.append("end_time", $("#end_time").val());
        console.log($("#start_time").val());
        
        $.ajax({
            url: "<?=ROOT?>course_material/schedule_class",
            type: 'POST',
            dataType: 'json',
            data: $data,
            processData: false,
            contentType: false,
            beforeSend: function() {
                console.log("waiting....");
            },
            success: function(response) {
                console.log(response);
            },
            error: function() {
                console.log("OOOPs something is wrong");
            },
        });
    });
});

</script>


</body>
</html>