<!doctype html>
<html lang="en">
  <head>
  	<title>Fenix consulting registo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

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
						<div class="img" style="background-image: url(images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
					      	<div class="d-flex">
					      		<div class="w-100">
					      			<h3 class="mb-4">Registo</h3>
				      			</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
									</p>
								</div>
			      			</div>
			      			<?php 
			      			if($this->session->flashdata('erro') != null){?>
			      				<p style="color:red;"><?php echo $this->session->flashdata('erro');?></p>
			      			<?php } ?>
							<form class="signin-form" method="POST" action="<?= base_url('painel/registo'); ?>">
					      		<div class="form-group mb-3">
					      			<label class="label" for="name">Email:</label>
					      			<input type="text" name="email" class="form-control" placeholder="Email" required>
					      		</div>
					            <div class="form-group mb-3">
				            		<label class="label" for="password">Password</label>
					              	<input type="password" name="password" class="form-control" placeholder="Password" title="Palavra password necessita de pelo menos 8 carateres" required>
					              	<label class="label" for="password">Confrimar Password</label>
					              	<input type="password" title="Palavra password necessita de pelo menos 8 carateres" name="password2" class="form-control" placeholder="Password" required>
					              	<div class="form-group form-check">
									    <input type="checkbox" class="form-check-input" value="false" id="termos">
									    <label required class="form-check-label"><a>Termos e condições</a></label>
									</div>
					            </div>
					            <div class="form-group">
					            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Registo</button>
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

