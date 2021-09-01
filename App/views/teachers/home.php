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
                                <div class="card-title text-white"><?= $_GET['data-id']?> -> Uploaded Course Materials
                                </div>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                    data-target="#folderModal">
                                    <i class="fas fa-upload"></i>
                                    New Folder
                            </div>
                        </div>

                        <div class="card-body">
                            <?php if(is_array($data['folders'])): 
                            if(count($data['folders']) <= 0):?>

                            <h2 class="text-warning">You haven't upload anything yet</h2>
                            <?php else: ?>
                            <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist"
                                aria-multiselectable="true">

                                <?php foreach($data['folders'] as $folder): ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="folder_collapse">
                                        <div class="dropdown float-left">
                                            <button class="btn btn-info btn-sm m-0 mr-3 p-2 dropdown-toggle"
                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-info">
                                                <a class="dropdown-item" href="#">Upload File</a>
                                                <a class="dropdown-item" href="#">Rename folder</a>
                                                <a class="dropdown-item" href="#">Delete folder</a>
                                            </div>
                                        </div>

                                        <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapse79"
                                            aria-expanded="true" aria-controls="collapse79">
                                            <h5 class="mt-1 mb-0">
                                                <span><?= $folder?></span>
                                                <i class="fas fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <div id="collapse79" class="collapse" role="tabpanel"
                                        aria-labelledby="folder_collapse" data-parent="#accordionEx78">
                                        <div class="card-body">
                                            <div class="table-responsive mx-3">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkbox4">
                                                                <label for="checkbox4" class="mr-2 label-table"></label>
                                                            </th>
                                                            <th class="th-lg"><a>Name <i
                                                                        class="fas fa-sort ml-1"></i></a></th>
                                                            <th class="th-lg"><a>Condition<i
                                                                        class="fas fa-sort ml-1"></i></a></th>
                                                            <th class="th-lg"><a>Last edited<i
                                                                        class="fas fa-sort ml-1"></i></a></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkbox5">
                                                                <label for="checkbox5" class="label-table"></label>
                                                            </th>
                                                            <td>Test subscription</td>
                                                            <td>Scroll % is equal or greater than <strong>80</strong>
                                                            </td>
                                                            <td>12.06.2017</td>
                                                            <td>
                                                                <a><i class="fas fa-info mx-1" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        title="Tooltip on top"></i></a>
                                                                <a><i class="fas fa-pen-square mx-1"></i></a>
                                                                <a><i class="fas fa-times mx-1"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkbox6">
                                                                <label for="checkbox6" class="label-table"></label>
                                                            </th>
                                                            <td>Product Hunt Visitor</td>
                                                            <td>Scroll % is equal or greater than <strong>80</strong>
                                                            </td>
                                                            <td>13.06.2017</td>
                                                            <td>
                                                                <a><i class="fas fa-info mx-1" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        title="Tooltip on top"></i></a>
                                                                <a><i class="fas fa-pen-square mx-1"></i></a>
                                                                <a><i class="fas fa-times mx-1"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkbox14">
                                                                <label for="checkbox14" class="label-table"></label>
                                                            </th>
                                                            <td>Test subscription</td>
                                                            <td>Scroll % is equal or greater than <strong>80</strong>
                                                            </td>
                                                            <td>12.06.2017</td>
                                                            <td>
                                                                <a><i class="fas fa-info mx-1" data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        title="Tooltip on top"></i></a>
                                                                <a><i class="fas fa-pen-square mx-1"></i></a>
                                                                <a><i class="fas fa-times mx-1"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>

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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="addButton" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
                                    <input type="hidden" name="action" value="create_folder">
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
				if(result != ""){

					if(result == 'Folder created successfully!')
					{
						$('#folderModal').modal('hide');
						alert(result);
					}else if(result == 'Folder Name updated successfully!') {
						$('#folderModal').modal('hide');
						alert(result);
					}
					else {
						alert(result);
					}
				}
			}

        $(document).on('submit', '#addfolderform', function (event) { 
				event.preventDefault();
                $data1 = new FormData(this);
                $data1.append("folder", "<?php echo $data['folder_name'] ?>");
				// $data.append("username", $("#username_u").val());


				$.ajax({
					url: "<?=ROOT?>course_material/manage_folder",
					type: 'POST',
					dataType: 'json',
					data: $data1,  
					processData: false,
					contentType: false,
					beforeSend: function (){
						console.log("waiting....");
					},
					success: function(response){
						handle_result(response);
						// console.log(response);
					},
					error: function (){
						console.log("OOOPs something is wrong");
					},
				});
			});
    });
    </script>

    </body>

    </html>