	<?php $this->view('includes/header', $data); ?>
	<?php $this->view('admin/sidebar', $data); ?>
	

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Course List</h4>
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
								<a href="#">Course</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">List</a
							</li>
						</ul>
					</div>
					<div class="row">
						
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Add Row</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#courseModal">
											<i class="fa fa-plus"></i>
											Add Course
                                        </a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Course
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="" id="addform" enctype="multipart/form-data">
													<div class="modal-body bg-dark">
														<div class="row">
															<div class="col-md-12 col-lg-12">
																<div class="form-group">
																	<label for="CrsCode">Course Code</label>
																	<input name="CrsCode" id="CrsCode" type="text" class="form-control" placeholder="Fill Course code" required> 
																</div>
																<div class="form-group">
																	<label for="CrsName">Course Name</label>
																	<input id="CrsName" name="CrsName" type="text" class="form-control" placeholder="Fill Course Name" required> 
																</div>
																<div class="form-group">
																	<label for="CrsCreditHrs">Credit Hours</label> 
																	<select class="form-control" name="CrsCreditHrs" id="CrsCreditHrs">
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																	</select>
																</div>
																<div class="form-group">
																	<label for="CrsYr">Given Year</label> 
																	<select class="form-control" name="CrsYr" id="CrsYr">
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																	</select>
																</div>
																<div class="form-group">
																	<label for="CrsImage">Cource Image</label>
																	<input type="file" class="form-control-file" name="photo" id="CrsImage">
																	<input type="hidden" name="oldimage" id="oldimage">
																
																</div>
																<div class="form-group">
																	<label for="CrsDesc">Course Description</label>
																	<textarea class="form-control" name="CrsDesc" id="CrsDesc" rows="3" required></textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer no-bd">
														<button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
														<input type="hidden" name="action" value="add_course">
													</div>
												</form>
											</div>
										</div>
									</div>

									<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Assign</span> 
														<span class="fw-light">
															Course
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="" id="assignform">
													<div class="modal-body">
														<div class="row">
															<div class="col-md-12 col-lg-12">
																<div class="form-group">
																	<label for="CrsCode_a">Course Code</label>
																	<input name="CrsCode_a" id="CrsCode_a" type="text" class="form-control" disabled> 
																</div>
																
																<div class="form-group">
																
																	<label for="assignedTech">Credit Hours</label> 
																	<?php if(is_array($data['rows'])): ?>

																	<select class="form-control text-dark" name="assignedTech" id="assignedTech">
																	<?php foreach($data['rows'] as $row):?>
																		<option  class="text-dark" value="<?= $row -> ID ?>"><?php show($row -> Name);  ?></option>

																		<?php endforeach;?>

																	</select>
																	<?php endif; ?>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer no-bd">
														<button type="submit" class="btn btn-primary">Add</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Crs Code</th>
													<th>Crs Name</th>
													<th>Credit Hrs</th>
													<th>Given Year</th>
													<th>Image</th>
													<th >Crs Desc</th>
													<th>Assigned To</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Crs Code</th>
													<th>Crs Name</th>
													<th>Credit Hrs</th>
													<th>Given Year</th>
													<th>Image</th>
													<th>Crs Desc</th>
													<th>Assigned To</th>
												</tr>
											</tfoot>
											
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
	<?php $this->view('includes/footer'); ?>
	
	<script >
		$(document).ready(function() {

			function handle_result(result) {
				if(result != ""){

					if(result == 'Course added successfully!')
					{
						$('#courseModal').modal('hide');
						alert(result);
						$('#add-row').DataTable().ajax.reload();
						$("#addform")[0].reset();
						
					}else if(result == 'Course updated successfully!') {
						$('#courseModal').modal('hide');
						alert(result);
						$('#add-row').DataTable().ajax.reload();
						$("#updateform")[0].reset();
					}else if(result == 'Course Assigned successfully!') {
						$('#assignModal').modal('hide');
						alert(result);
						$('#add-row').DataTable().ajax.reload();
						$("#assignform")[0].reset();
					}
					
					else {
						alert(result);
					}
				}
			}

			$.ajax({
				url: "<?=ROOT?>course_controller/display",
				method: "POST",
				success: function (data) {
					$('#add-row').DataTable( {
						"pageLength": 5,
						"ajax": "<?=ROOT?>course_controller/display",
						"columnDefs": [{
							"defaultContent": "-",
							"targets": "_all"
						}]
					});
				}
			});

			$(document).on('submit', '#addform', function (event) { 
				event.preventDefault();
				$.ajax({
					url: "<?=ROOT?>course_controller/add",
					type: 'POST',
					dataType: 'json',
					data: new FormData(this),  
					processData: false,
					contentType: false,
					beforeSend: function (){
						console.log("waiting....");
					},
					success: function(response){
						handle_result(response);
					},
					error: function (){
						console.log("OOOPs something is wrong");
					},
				});
			});

			$(document).on('click', '.update', function () {
				var a = $(this).attr('info');
				var info = JSON.parse(a.replaceAll("'", '"'));

				$("#CrsCode").val(info.CourseCode);	
				$("#CrsName").val(info.CourseName);
				$("#CrsCreditHrs").val(info.CourseCrdHrs);
				$("#CrsYr").val(info.CourseGivenYear);
				$("#CrsDesc").val(info.CourseDescription);
				$("#oldimage").val(info.CourseImage);
				$('#addform').attr("id", "updateform");
				$("#CrsCode").attr("disabled", "disabled");
			});

			$(document).on('submit', '#updateform', function (event) { 
				event.preventDefault();
				var $data = new FormData(this);
				$data.append("CrsCode", $("#CrsCode").val());

				$.ajax({
					url: "<?=ROOT?>course_controller/update",
					type: 'POST',
					dataType: 'json',
					data: $data,  
					processData: false,
					contentType: false,
					beforeSend: function (){
						console.log("waiting....");
					},
					success: function(response){
						handle_result(response);
					},
					error: function (){
						console.log("OOOPs something is wrong");
					},
				});
			});

			$(document).on('click', '.assign', function () {
				var a = $(this).data('id');
				$("#CrsCode_a").val(a);	
			});

			$(document).on('submit', '#assignform', function (event) { 
				event.preventDefault();
				var $data = new FormData(this);
				$data.append("CrsCode_a", $("#CrsCode_a").val());

				$.ajax({
					url: "<?=ROOT?>course_controller/assign",
					type: 'POST',
					dataType: 'json',
					data: $data,  
					processData: false,
					contentType: false,
					beforeSend: function (){
						console.log("waiting....");
					},
					success: function(response){
						handle_result(response);
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