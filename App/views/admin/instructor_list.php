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
								<a href="#">Instructors</a>
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
						
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Add Row</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#userModal">
											<i class="fa fa-plus"></i>
											Add Instructor
                                        </a>
									</div>
								</div>
								<div class="card-body">
									<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Lecturers
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
																	<label for="name">Full Name</label>
																	<input id="name" name="name" type="text" class="form-control" placeholder="Fill Name" >
																</div>
																<div class="form-group">
																	<label for="email">Email Address</label>
																	<input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" >
																</div>
																<div class="form-group">
																	<label for="image">Load Photo</label>
																	<input type="file" name="photo" class="form-control-file" id="image" >
																</div>
																<div class="form-group">
																	<label for="contact">Contact Number</label>
																	<input type="number" name="contact" class="form-control-file" id="contactt" >
																</div>
																<div class="form-group">
																	<label for="qualification">Qualification</label> 
																	<select class="form-control" name="qualification" id="qualification" >
																		<option>Degree</option>
																		<option>Masters</option>
																		<option>PHD</option>
																	</select>
																</div>
																<div class="form-group">
																	<label for="username">Username</label>
																	<div class="input-icon">
																		<span class="input-icon-addon">
																			<i class="fa fa-user"></i>
																		</span>
																		<input type="text" name="username" class="form-control" placeholder="Username" >
																	</div>
																</div>
					
																<div class="form-group">
																	<label for="password">Password</label>
																	<input type="password" name="password" class="form-control" id="password" placeholder="Password" >
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer no-bd">
														<button type="submit" id="addButton" class="btn btn-primary">Add</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Clear</button>
														<input type="hidden" name="action" value="add_teacher">
													</div>
												</form>
											</div>
										</div>
									</div>

									<div class="modal fade" id="updateTech" tabindex="-1" role="dialog" aria-hidden="true">
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
												<form method="POST" id = "updateform">
													<div class="modal-body bg-dark">
														<div class="row" >
															<div class="col-md-12 col-lg-12"  >
																<div class="form-group">
																	<label for="username">Username</label>
																	<div class="input-icon">
																		<span class="input-icon-addon">
																			<i class="fa fa-user"></i>
																		</span>
																		<input name="username" id="username_u" type="text" class="form-control" placeholder="Username" disabled>
																	</div>
																</div>

																<div class="form-group">
																	<label for="name">Full Name</label>
																	<input name="name" id="name_u" type="text" class="form-control" placeholder="Fill Name" required>
																</div>

																<div class="form-group">
																	<label for="email">Email Address</label>
																	<input name="email" type="email" class="form-control" id="email_u" placeholder="Enter Email" required>
																</div>
																
																<div class="form-group">
																	<label for="qualification">Qualification</label> 
																	<select class="form-control" name="qualification" id="qualification_u">
																		<option>Degree</option>
																		<option>Masters</option>
																		<option>PHD</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer no-bd">
														<button type="submit" id="updateBtn" class="btn btn-primary">Add</button>
														<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
														<input type="hidden" id = "updateinfo" name="action" value="update_teacher">
													</div>
												</form>

												
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
													<th>Qualification</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<th>Username</th>
												<th>Name</th>
												<th>Email</th>
												<th>Image</th>
												<th>Contact No</th>
												<th>Qualification</th>
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

					if(result == 'Teacher added successfully!')
					{
						$('#userModal').modal('hide');
						alert(result);
						$('#add-row').DataTable().ajax.reload();
						$("#addform")[0].reset();
					}else if(result == 'Teacher updated successfully!') {
						$('#updateTech').modal('hide');
						alert(result);
						$('#add-row').DataTable().ajax.reload();
						$("#updateform")[0].reset();
					}
					
					else {
						alert(result);
					}
				}
			}

			$.ajax({
				url: "<?=ROOT?>teachers_controller/display",
				method: "POST",
				success: function (data) {
					$('#add-row').DataTable( {
						"pageLength": 5,
						"ajax": "<?=ROOT?>teachers_controller/display",
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
					url: "<?=ROOT?>teachers_controller",
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
				$("#name_u").val(info.Name);	
				$("#email_u").val(info.InstEmail);
				$("#username_u").val(info.Username);
				$("#qualification_u").val(info.Qualification);
			});


			$(document).on('submit', '#updateform', function (event) { 
				event.preventDefault();
				var $data = new FormData(this);
				$data.append("username", $("#username_u").val());
				$.ajax({
					url: "<?=ROOT?>teachers_controller",
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