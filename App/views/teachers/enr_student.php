<?php $this->view('includes/header', $data); ?>
<?php $this->view('teachers/sidebar', $data); ?>


<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
			<div class="col-md-6">
				<div class="card card-round">
					<div class="card-body">
						<div class="card-title d-flex" style="font-size: 25px;">Enrolled Students List</div>
						<?php if(is_array($data['rows'])): 
							foreach($data['rows'] as $row):?>
						<div class="card-list">
							<div class="item-list">
								<div class="avatar">
									<img src="<?=ROOT.$row -> Image ?>" alt="..." class="avatar-img rounded-circle">
								</div>
								<div class="info-user ml-3">
									<div class="username"> <?php echo ($row -> Name) ?> </div>
									<div class="status"><?php echo ($row -> Username) ?></div>
								</div>
								<a class="btn btn-icon btn-primary btn-round btn-xs text-white" id="stud_detail" data-id="<?php echo $row->Username?>">
									<i class="fas fa-info-circle"></i>
								</a>
							</div>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="col-md-4" id="detail">
				<div class="card card-pricing card-pricing-focus card-primary">
					<div class="card-header">
						<h4 class="card-title"><b> Student Profile</b></h4>
					</div>
					<div class="card-body">
						<ul class="specification-list">
							<li class="content-center">
								<img src="" id='image' alt="..." class="avatar-img rounded-circle" style="width: 100px; height: 100px">
								<a href="" class="btn status-specification mt-5 btn-danger btn-rounded btn-sm">Email</a>
							</li>
							<li>
								<span class="name-specification">Full Name</span>
								<span class="status-specification" id = 'name'></span>
							</li>
							<li>
								<span class="name-specification">Id No.</span>
								<span class="status-specification" id = 'username'></span>
							</li>
							<li>
								<span class="name-specification">Email</span>
								<span class="status-specification" id = 'email'></span>
							</li>
							<li>
								<span class="name-specification">Year</span>
								<span class="status-specification" id = 'batch'></span>
							</li>
						</ul>
					</div>
					
				</div>
				
			</div>
		</div>
	</div> 
</div>
<?php $this->view('includes/footer'); ?> 

<script>
$(document).ready(function() {
	$("#detail").hide();

	$(document).on('click', '#stud_detail', function() {
		var id = $(this).data('id');
		$data = new FormData();
		$data.append("id", id);
		$.ajax({
			url: "<?=ROOT?>student/get_info_by_id",
			method: "POST",
			data: $data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(data) {
				console.log(data);
				$('#name').text(data[0].Name);
				$('#username').text(data[0].Username);
				$('#email').text(data[0].StudEmail);
				$('#batch').text(data[0].Batch);
				$('#image').attr("src", "<?=ROOT?>" + data[0].Image);
				$("#detail").show();
			}
		});
	}); 
});

</script>
</body>
</html>