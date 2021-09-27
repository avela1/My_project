<?php $this->view('includes/header', $data); ?>

<?php $this->view('students/sidebar', $data); ?>
<div class="main-panel">
    <div class="panel-header bg-primary-gradient ">
        <div class="page-inner">
        </div>
    </div>
    <div class="content ml-5 mr-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><b> Avalable Course</b></h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link text-dark active" data-toggle="tab" href="#current">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" data-toggle="tab" href="#add_drop">Add/Drop Courses</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <?php if ($data['user_data'][0]->registered == 1): ?>
                                <h2 class="text-danger">You do not have courses for registration for the current academic year and semester!</h2>
                            <?php else:?>
                            <div role="tabpanel" class="tab-pane active" id='current'>
                                <div class="table-responsive mt-5">
									<form method="POST" id = "main">
                                        <table id="basic-datatables" class="display table table-striped table-hover " >  
                                            <thead>
                                                <tr>
                                                    <th scope="col"  style="width: 15px;"> 
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" id="check" value="aa" name="check_list[]">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </th>
                                                    <th>Course Title</th>
                                                    <th>Course Code</th>
                                                    <th>Credit Hours</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <th><input type="hidden" id="regtype" value="main_course"></th>
                                                <th><button type="submit" id="updateBtn" class="btn btn-primary">Submit</button></th>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id='add_drop'>
                                <div class="table-responsive mt-5 ">
                                    <form method="POST" id = "main">
                                    <table id="basic-datatables2" class="display table table-striped table-hover " >  
                                        <thead>
                                            <tr>
                                                <th scope="col"  style="width: 15px;"> 
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" id="check" name="check_list[]" value="">
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Credit Hours</th>
                                                <th>Year</th>
                                            </tr>
                                            <tfoot>
                                                <th><input type="hidden" id="regtype" value="add_drop"></th>
                                                <th><button type="submit" id="updateBtn" class="btn btn-primary">Submit</button></th>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?>

<script>

    $(document).ready(function() {

        $.ajax({
            url: "<?=ROOT?>student/available_crs",
            type: "POST",
            dataType: 'json',
            processData: false,
			contentType: false,
            success: function (response) {
                $('#basic-datatables').DataTable( {
                    "ajax": "<?=ROOT?>student/available_crs",
                    "columnDefs": [{
                        "defaultContent": "-",
                        "targets": "_all"
                    }]
                });
            }
        });
        $.ajax({
            url: "<?=ROOT?>student/all_crs",
            type: "POST",
            dataType: 'json',
            processData: false,
			contentType: false,
            success: function (response) {
                $('#basic-datatables2').DataTable( {
                    "ajax": "<?=ROOT?>student/all_crs",
                    "columnDefs": [{
                        "defaultContent": "-",
                        "targets": "_all"
                    }]
                });
            }
        });

        $(document).on('submit', '#main', function (event) { 
				event.preventDefault();
                var $data = new FormData(this);
                $data.append('stud_id', "<?= $data['user_data'][0] -> ID ?>");
                $data.append('form_type', $("#regtype").val());
				$.ajax({
					url: "<?=ROOT?>student/register",
					type: 'POST',
					dataType: 'json',
					data: $data,  
					processData: false,
					contentType: false,
					beforeSend: function (){
						console.log("waiting....");
					},
					success: function(response){
						alert(response);
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