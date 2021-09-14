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
                                <i class="fas fa-pen-square text-danger"></i> <?= ($_GET['data-id'])?>  Note   
                                </div>
                            </div>
                        </div>
                        <form action="" method="post" id="upload-form" enctype="multipart/form-data">
                            <div class="card-body">     
                                <textarea name="note" id="note"></textarea>
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
                $data.append("folder", "<?= ($_GET['data-id'])?>");
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
                        // handle_result(response);
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