<?php $this->view('includes/header', $data); ?>
<?php $this->view('teachers/sidebar', $data); ?>

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
							<div class="card-body" >
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
										
										<tbody>
											<?php 
													$DB = Database::newInstance();
													$result = $DB->read("SELECT `Username`, `Name`, `StudEmail`, `Image`, `StudContactNo`, `Batch` FROM `studentinfo`");

											?>
										</tbody>
										
										<!-- <tbody id="table_body">
											<tr>
												<td>Tiger Nixon</td>
												<td>System Architect</td>
												<td>Edinburgh</td>
												<td>Edinburgh</td>
												<td>Edinburgh</td>
												<td>Edinburgh</td>
												<td>
													<div class="form-button-action">
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
															<i class="fa fa-edit"></i>
														</button>
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Disable">
															<i class="fa fa-times"></i>
														</button>
													</div>
												</td>
											</tr>
										</tbody> -->
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	<?php $this->view('includes/footer'); ?>
</body>
</html>