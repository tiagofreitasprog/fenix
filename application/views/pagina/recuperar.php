<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Fenix consulting</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Recuperação de password</h3>
			      		</div>
						<div class="w-100">
							<p class="social-media d-flex justify-content-end">
								<a href="<?php echo base_url('painel/facebook') ?>" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
							</p>
						</div>
			      	</div>
			      		<div id="infoMessage" ><p style="color:red;"><?php echo $this->session->flashdata('erro');?></p></div>
					<form class="signin-form" method="POST" action="<?= base_url('painel/updatePassword'); ?>">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Password:</label>
			      			<input type="text" name="password" class="form-control" placeholder="Password" required>
			      		</div>
			            <div class="form-group mb-3">
			            	<label class="label" for="password2">Confirmar Password</label>
			              <input type="password" name="password" class="form-control" placeholder="Password2" required>
			              <input value="<?php echo $token ?>" type="text" name="token" hidden>
			            </div>
			            <div class="form-group">
			            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Recuperar</button>
			            </div>
		         	</form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

