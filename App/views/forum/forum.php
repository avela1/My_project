<?php $this->view('includes/header', $data); ?>
<link rel="stylesheet" href="<?= ASSETS ?>/css/main.css">
<?php $this->view('teachers/sidebar', $data); ?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
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
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-9" id="mainchat">
                    <div class="card card-round">
                       <div class="card-header">Forum</div>
                        <div class="card-body msg_card_body">
							<div class="d-flex justify-content-start mb-4">
								<div class="avatar">
                                <img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
								<div class="msg_cotainer">
                                    <h4>Chad</h4> 
                                    <p>Hey man how are you doing????????????????</p>
									<span class="msg_time">8:40 AM, Today</span>
								</div>
							</div>
							<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
                                        <h4>Jiimmy Smith</h4> 
                                        <p>I am good man how are doing</p>
									<span class="msg_time_send">8:55 AM, Today</span>
								</div>
								<div class="avatar">
                                    <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</div>
							<div class="d-flex justify-content-start mb-4">
								<div class="avatar">
                                <img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
								<div class="msg_cotainer">
                                    <h4>Jiimmy Smith</h4> 
                                    <p> I am good too, thank you for your chat template</p>
									<span class="msg_time">9:00 AM, Today</span>
								</div>
							</div>
						</div>
                        <div class="card-footer">
                            <form method="POST" action="" id="sendchatform"  enctype="multipart/form-data">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        
                                        <button type="text" id="btnfile" class="input-group-text attach_btn text-success"><i class="fas fa-paperclip"></i></button>
                                        <input type='file' name="uploadfile" id="uploadfile" style="display:none"></input>
                                    </div>
                                    <textarea name="chattext" id="chattext" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                    <div class="input-group-append">
                                        <button class="input-group-text send_btn" type="submit" id="sendchat"><i class="fas fa-location-arrow"></i></button>
                                    </div>
                                </div>
                            </form>
						</div>
                    </div>
                </div>
                <div class="col-md-3" id="emailchat">
                    <div class="card card-round">
                        <div class="card-body">
                            <div class="card-title fw-mediumbold">Contact Directly By email</div>
                            <form class="navbar-left navbar-form nav-search mr-md-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-search pr-1">
                                            <i class="fa fa-search search-icon"></i>
                                        </button>
                                    </div>
                                    <input type="text" placeholder="Search ..." class="form-control">
                                </div>
                            </form>
                            <div class="card-list">
                                <?php if(is_array($data['rows'])): ?>
                                    <?php foreach($data['rows'] as $row):?>
                                <div class="item-list">
                                    <div class="avatar">
                                        <img src="<?= ROOT.$row -> CourseImage ?>" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                    <div class="info-user ml-3">
                                        <div class="username"><?= $row -> CourseName; ?></div>
                                    </div>
                                    <button class="btn btn-icon btn-primary btn-round btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                    <?php endforeach;?>
                                <?php endif; ?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->view('includes/footer'); ?>

<script>
$(document).ready(function () {
   $('#wrapper').addClass('sidebar_minimize');

   $("#btnfile").click(function () {
       $('#uploadfile').click();
   })

   $(document).on('submit', '#sendchatform', function(event) {
        event.preventDefault();
        $data = new FormData(this);
        $data.append("crs_code", "<?php echo($data['crs_code']);?>");
        $data.append("user_id", "<?php echo($data['user_id']);?>");
        $.ajax({
                url: "<?=ROOT?>chat_controller/sendchat",
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
    })
   function mediaSize() {
		if (window.matchMedia("(max-width: 1000px)").matches) {
            $('#mainchat').addClass('col-md-12');
            $('#emailchat').addClass('col-md-12');
		} else {
            $('#mainchat').removeClass('col-md-12');
            $('#emailchat').removeClass('col-md-12');
        }
	}
	mediaSize();
	window.addEventListener("resize", mediaSize, false);

});

</script>
</body>

</html>