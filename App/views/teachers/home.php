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
                    <div class="card bg-dark">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="card-title text-white"><i
                                        class="fas fa-folder p-3"></i><?= $_GET['data-id']?> uploded files
                                </div>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#folderModal">
                                    <i class="fas fa-upload"></i>
                                    New Folder
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <?php if(is_array($data['folders'])): 
                            if(count($data['folders']) <= 0):?>

                            <h2 class="text-warning">You haven't upload anything yet</h2>
                            <?php else: $count = sizeof($data['folders']); ?>
                            <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist"
                                aria-multiselectable="true">

                                <?php for($i = 0; $i < $count; $i++) : ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="folder_collapse">
                                        <div class="dropdown float-left">
                                            <button class="btn btn-info btn-sm m-0 mr-3 p-2 dropdown-toggle"
                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-info">
                                                <a class="dropdown-item" data-toggle="modal" id="upload"
                                                    data-name="<?= $data['folders'][$i]?>" href="#fileModal">Upload
                                                    File</a>
                                                <a class="dropdown-item" data-toggle="modal" id="renamefolder"
                                                    data-name="<?= $data['folders'][$i]?>" href="#folderModal">Rename
                                                    folder</a>
                                                <a class="dropdown-item" href="#">Delete folder</a>
                                            </div>
                                        </div>

                                        <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapse79<?=$i?>"
                                            aria-expanded="true" aria-controls="collapse79<?=$i?>">
                                            <h5 class="mt-1 mb-0">
                                                <span><?= $data['folders'][$i]?></span>
                                                <i class="fas fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <div id="collapse79<?=$i?>" class="collapse" role="tabpanel"
                                        aria-labelledby="folder_collapse" data-parent="#accordionEx78">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div id="add-row_wrapper"  class="dataTables_wrapper container-fluid dt-bootstrap4">
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="add-row" class="display table table-striped table-hover dataTable"  role="grid" aria-describedby="add-row_info">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th ><i>File Name</th>
                                                                        <th style="width: 10%">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th rowspan="1" colspan="1">File Name</th>
                                                                        </th>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                    <tr role="row" class="odd">
                                                                        
                                                                        <td class="sorting_1"> <a href="#"><i class="fas fa-file p-3"></i>Airi Satou</a> </td>
                                                                        <td>
                                                                            <div class="form-button-action">
                                                                                <button type="button"
                                                                                    data-toggle="tooltip" title=""
                                                                                    class="btn btn-link btn-info btn-lg"
                                                                                    data-original-title="Download file">
                                                                                    <a><i
                                                                                            class="fas fa-download"></i></a>
                                                                                </button>
                                                                                <button type="button"
                                                                                    data-toggle="tooltip" title=""
                                                                                    class="btn btn-link btn-primary"
                                                                                    data-original-title="Update file ">
                                                                                    <i class="fa fa-edit"></i>
                                                                                </button>
                                                                                <button type="button"
                                                                                    data-toggle="tooltip" title=""
                                                                                    class="btn btn-link btn-danger"
                                                                                    data-original-title="Delete file">
                                                                                    <i class="fa fa-times"></i>
                                                                                </button>

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-sm-12 col-md-7">
                                                            <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                                                <ul class="pagination">
                                                                    <li class="paginate_button page-item previous disabled"
                                                                        id="add-row_previous"><a href="#"
                                                                            aria-controls="add-row" data-dt-idx="0"
                                                                            tabindex="0" class="page-link">Previous</a>
                                                                    </li>
                                                                    <li class="paginate_button page-item active"><a
                                                                            href="#" aria-controls="add-row"
                                                                            data-dt-idx="1" tabindex="0"
                                                                            class="page-link">1</a></li>
                                                                    <li class="paginate_button page-item "><a href="#"
                                                                            aria-controls="add-row" data-dt-idx="2"
                                                                            tabindex="0" class="page-link">2</a></li>
                                                                    <li class="paginate_button page-item next"
                                                                        id="add-row_next"><a href="#"
                                                                            aria-controls="add-row" data-dt-idx="3"
                                                                            tabindex="0" class="page-link">Next</a></li>
                                                                </ul>
                                                            </div>
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


                <div class="modal fade" id="folderModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        New</span>
                                    <span class="fw-light">
                                        Folder
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="" id="addfolderform">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="name">Folder Name</label>
                                                <input id="name" name="name" type="text" class="form-control"
                                                    placeholder="Fill Name">
                                                <input type="hidden" name="oldVal" id="oldVal" value="oldVal">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="addButton" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
                                    <input type="hidden" name="action" id="action" value="create_folder">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        New</span>
                                    <span class="fw-light">
                                        File
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="" id="uploadForm" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="fname">Location</label>
                                                <input id="loc" name="loc" type="text" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="fname">File Name</label>
                                                <input id="fname" name="fname" type="text" class="form-control"
                                                    placeholder="Fill File Name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="fileloc">Load File</label>
                                                <input type="file" name="fileloc" class="form-control-file"
                                                    id="fileloc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="uploadFile" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
                                    <input type="hidden" name="action" value="upload_file">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->view('includes/footer'); ?>

    <script>
    $(document).ready(function() {

        function handle_result(result) {
            if (result != "") {

                if (result == 'Folder created successfully!') {
                    $('#folderModal').modal('hide');
                    alert(result);
                    $("#addfolderform")[0].reset();
                } else if (result == 'Folder Name updated successfully!') {
                    $('#folderModal').modal('hide');
                    alert(result);
                    $("#addfolderform")[0].reset();

                } else if (result == 'Course material uploaded successully!') {
                    $('#fileModal').modal('hide');
                    alert(result);
                    $("#uploadForm")[0].reset();

                } else if (result == 'FCourse material updated successully!') {
                    $('#folderModal').modal('hide');
                    alert(result);
                    $("#uploadForm")[0].reset();

                } else if (result == 'Folder Name updated successfully!') {
                    $('#folderModal').modal('hide');
                    alert(result);
                } else {
                    alert(result);
                }
            }
        }

        $(document).on('submit', '#addfolderform', function(event) {
            event.preventDefault();
            $data1 = new FormData(this);
            $data1.append("folder", "<?php echo $data['folder_name'] ?>");

            $.ajax({
                url: "<?=ROOT?>course_material/manage_folder",
                type: 'POST',
                dataType: 'json',
                data: $data1,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    console.log("waiting....");
                },
                success: function(response) {
                    handle_result(response);
                    // console.log(response);
                },
                error: function() {
                    console.log("OOOPs something is wrong");
                },
            });
        });

        $(document).on('submit', '#uploadForm', function(event) {
            event.preventDefault();
            $data1 = new FormData(this);
            $data1.append("folder", "<?php echo $data['folder_name'] ?>");
            $data1.append("crs_code", "<?= $_GET['data-id']?>");
            $data1.append("foldername", $("#loc").val());

            $.ajax({
                url: "<?=ROOT?>course_material/upload_file",
                type: 'POST',
                dataType: 'json',
                data: $data1,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    console.log("waiting....");
                },
                success: function(response) {
                    handle_result(response);
                },
                error: function() {
                    console.log("OOOPs something is wrong");
                },
            });
        });

        $(document).on('click', '#renamefolder', function() {
            var name1 = $(this).data('name');
            console.log(name1);
            $("#name").val(name1);
            $("#oldVal").val(name1);
            $("#action").attr("value", "update_folder");
            $("#addButton").html("Update");
        });

        $(document).on('click', '#upload', function() {
            var name1 = $(this).data('name');
            $("#loc").val(name1);
        });

        $.ajax({
            url: "<?=ROOT?>course_material/display",
            method: "POST",
            data: $(this).data('name'),
            success: function (data) {
                // $('#add-row').DataTable( {
                //     "pageLength": 5,
                //     "ajax": "<?=ROOT?>course_material/display",
                //     "columnDefs": [{
                //         "defaultContent": "-",
                //         "targets": "_all"
                //     }]
                // });
            }
        });

    });
    </script>

    </body>

    </html>