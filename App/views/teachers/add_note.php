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
                                <div class="card-title">
                                <?php $folder="";
                                
                                if(isset($_GET['data-id'])): 
                                    $folder = $_GET['data-id'];
                                    ?>
                                    <i class="fas fa-pen-square text-danger"></i> <?= ($_GET['data-id'])?>  Note   
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post" id="upload-form" enctype="multipart/form-data">
                            <div class="card-body">     
                                <textarea name="note" id="note"></textarea>
                                <input type="hidden" name="checker" id="checker" value="<?= $folder ?>">
                                <input type="hidden" name="noteid" id="noteid">
                            </div>

                            <div class="card-footer no-bd">
                                <button type="submit" id="addButton" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->view('includes/footer'); ?>

	<script src="<?= ASSETS ?>/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("note");
        $(document).ready(function() {

            $(document).on('submit', '#upload-form', function(event) {
                event.preventDefault();
                $data = new FormData(this);
                $data.append("folder", "<?= $folder ?>");
                console.log($data);
                $.ajax({
                    url: "<?=ROOT?>course_material/upload_notes",
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

            $(document).on('submit', '#update-form', function(event) {
                event.preventDefault();
                $data = new FormData(this);
				// $data.append("id", $("#noteid").val());
                $.ajax({
                    url: "<?=ROOT?>course_material/update_note",
                    type: 'POST',
                    dataType: 'json',
                    data: $data,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        console.log("waiting....");
                    },
                    success: function(response) {
                        alert(response);
                        window.location = "<?=ROOT?>teacher/dashboard";
                    },
                    error: function() {
                        console.log("OOOPs something is wrong");
                    },
                });
            });

            if($("#checker").val() == "") {
                $data = localStorage.getItem('data');
                $data = JSON.parse($data);
                $("#note").val($data[0].note);
                $("#noteid").val($data[0].ID);
                $('#upload-form').attr("id", "update-form");
                $("#addButton").text("Update");
            }
        });
    </script>
</body>
</html>