<?php $this->view('includes/header', $data); ?>
<?php $this->view('admin/sidebar', $data); ?>

	<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Students List</h4>
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
								<a href="#">Students</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">List</a
							</li>
						</ul>
					</div>
					<div class="row" >
						
						<div class="col-md-12" >
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Add Student</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#userModal">
											<i class="fa fa-plus"></i>
											Add Student
                                        </a>
									</div>
								</div>
								<div class="card-body" >
									<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Student
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" action="" id="addform" enctype="multipart/form-data">
													<div class="modal-body">
														<div class="row" >
															<div class="col-md-12 col-lg-12"  >
																<h3 id="error" type="text" class="text-danger"></h3>

																<div class="form-group">
																	<label for="name">Full Name</label>
																	<input name="name" id="name" type="text" class="form-control" placeholder="Fill Name" required >
																</div>
																<div class="form-group">
																	<label for="email">Email Address</label>
																	<input name="email" type="email" class="form-control" id="email" placeholder="Enter Email" required >
																</div>
																<div class="form-group">
																	<label for="exampleFormControlFile1">Load Photo</label>
																	<input name="photo" type="file" class="form-control-file" id="image" required >
																</div>
																<div class="form-group">
																	<label for="exampleFormControlFile1">Contact Number</label>
																	<input name="contact" type="number" class="form-control-file" id="contact" required >
																</div>
					
																<div class="form-group">
																	<label for="exampleFormControlFile1">Username</label>
																	<div class="input-icon">
																		<span class="input-icon-addon">
																			<i class="fa fa-user"></i>
																		</span>
																		<input name="username" id="username" type="text" class="form-control" placeholder="Username" required>
																	</div>
																</div>
					
																<div class="form-group">
																	<label for="password">Password</label>
																	<input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
																</div>
					
																<div class="form-group">
																	<label for="exampleFormControlSelect1">Select Student Batch</label> 
																	<select class="form-control" name = "batch" id="batch" required>
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button type="submit" id="addButton" class="btn btn-primary">Add</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
															<input type="hidden" name="action" value="add_student">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>

									<!-- Update Modal  -->

									<div class="modal fade" id="updateStud" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														UPDATE</span> 
														<span class="fw-light">
															Student
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body bg-dark">
													<form method="POST" >
														<div class="row" >
															<div class="col-md-12 col-lg-12"  >
																<div class="form-group">
																	<label for="usernameu">Username</label>
																	<div class="input-icon">
																		<span class="input-icon-addon">
																			<i class="fa fa-user"></i>
																		</span>
																		<input name="usernameu" id="usernameu" type="text" class="form-control" placeholder="Username" disabled>
																	</div>
																</div>

																<div class="form-group">
																	<label for="name">Full Name</label>
																	<input name="nameu" id="nameu" type="text" class="form-control" placeholder="Fill Name" required>
																</div>

																<div class="form-group">
																	<label for="email">Email Address</label>
																	<input name="emailu" type="email" class="form-control" id="emailu" placeholder="Enter Email" required>
																</div>
																
																<div class="form-group">
																	<label for="exampleFormControlSelect1">Student Batch</label> 
																	<select class="form-control" name= "batchu" id="batchu" required>
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																	</select>
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="updateBtn" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
													<input type="hidden" id = "updateinfo" name="action" value="update_student">
												</div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Username</th>
													<th>Name</th>
													<th>Email</th>
													<th>Image</th>
													<th>Contact No</th>
													<th>Batch</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tfoot>
												<tr>
													<th>Username</th>
													<th>Name</th>
													<th>Email</th>
													<th>Image</th>
													<th>Contact No</th>
													<th>Batch</th>
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

					if(result == 'Student added successfully!')
					{
						$('#userModal').modal('hide');
						alert(result);
						$('#add-row').DataTable().ajax.reload();
						
					}else if(result == '"Student updated successfully!"') {
						$('#updateStud').modal('hide');
						alert(result);
						$('#add-row').DataTable().ajax.reload();
					}
					
					else {
						$("#error").html(result);
					}
				}
			}

			$.ajax({
				url: "<?=ROOT?>student_controller/display",
				method: "POST",
				success: function (data) {
					$('#add-row').DataTable( {
						"pageLength": 5,
						"ajax": "<?=ROOT?>student_controller/display",
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
					url: "<?=ROOT?>student_controller",
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
				var id = $(this).data('id');
				var a = $(this).attr('info');
				var info = JSON.parse(a.replaceAll("'", '"'));
				$("#nameu").val(info.Name);	
				$("#emailu").val(info.StudEmail);
				$("#usernameu").val(info.Username);
				$("#batchu").val(info.Batch);
			});

			$('#updateBtn').click(function() {
				$.post("<?=ROOT?>student_controller", {
						name: $("#nameu").val(),					
						email: $("#emailu").val(),
						username:$("#usernameu").val(),
						batch: $("#batchu").val(),
						action: 'update_student'
					},
					function (data, status) {
						handle_result(data);
					}
				);
			});
		});
	</script>
</body>
</html>