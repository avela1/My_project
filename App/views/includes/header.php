<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>AAU ELearning Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= ASSETS ?>/images/logo2.png" type="image/x-icon"/>

	<link rel="stylesheet" href="<?= ASSETS ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= ASSETS ?>/css/atlantis.min.css">

	<script src="<?= ASSETS ?>/js/plugin/webfont/webfont.min.js"></script>
	
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= ASSETS ?>/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<style>
		.navbar {
			background-image: url("<?= ASSETS ?>/images/logo1.png");
			background-position: left;
			background-repeat: no-repeat;
			background-size: 100% 100%;
			height: 110px;
		}	
		.sidebar {
			position: fixed;
			margin-top: 100px
		}
		.more {
			padding-top:50px;
		}
		.main-panel {
			margin-top: 50px;
		}
		.logofont{
			font-size: 30px
		}
	</style>

</head>


<body data-background-color="white">
	<div class="wrapper">
		<div class="main-header">
			<!-- logo -->
			<div class="logo-header" data-background-color="white">
				
				<a href="<?= ROOT ?>admin/" class="logo">
					<img src="<?= ASSETS ?>/images/elogo.png" alt="navbar brand" class="navbar-brand w-50"> 
					<span class="text-primary fw-extrabold logofont">AAU</span>
				</a>
				
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>

			<nav class="navbar navbar-header py-3" >
				
			</nav>
		</div>

		
