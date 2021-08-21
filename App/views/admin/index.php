<?php $this->view('includes/header', $data); ?>
<?php $this->view('admin/sidebar', $data); ?>

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold"> <?=$_SESSION['userrole']?> </h2>
<<<<<<< HEAD
								<h5 class="text-white op-7 mb-2"> Welcome back ->  <?= $data['user_data'][0] -> Name ?></h5>
=======
								<h5 class="text-white op-7 mb-2"> Welcome back -> <?= $data['user_data'][0] -> Name ?> </h5>
>>>>>>> Myproject
							</div>
							
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">

					<div class="row">
						<div class="col-md-6">
							<div class="card card-dark bg-success-gradient">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right">100</div>
									<h2 class="mb-2">Registerd</h2>
									<p>Students</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-dark bg-secondary-gradient">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right">100</div>
									<h2 class="mb-2">Registerd </h2>
									<p>Instructors</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-dark bg-danger">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right">100</div>
									<h2 class="mb-2">Registerd </h2>
									<p>Courses</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card card-dark bg-warning">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right">100</div>
									<h2 class="mb-2">Registerd </h2>
									<p>Courses</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php $this->view('includes/footer'); ?>
</body>
</html>