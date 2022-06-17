<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
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
						<div class="img" style="background-image: url(images/bg-1.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Login</h3>
			      		</div>
						<div class="w-100">
							<p class="social-media d-flex justify-content-end">
								<a href="<?php echo base_url('painel/facebook') ?>" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
							</p>
						</div>
			      	</div>
			      		<div id="infoMessage" ><p style="color:red;"><?php echo $this->session->flashdata('erro');?></p></div>
							<form class="signin-form" method="POST" action="<?= base_url('painel/entrar'); ?>">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email:</label>
			      			<input type="text" name="user" class="form-control" placeholder="Email" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Lembrar-me
							  <input type="checkbox" checked>
							  <span class="checkmark"></span>
								</label>
							</div>
							<div class="w-50 text-md-right">
								<a href="#" data-toggle="modal" data-target="#exampleModal" >Esqueci a password</a>
							</div>
		            </div>
		          </form>
		          <p class="text-center">Não sou membro ainda? <a href="<?php echo base_url('registo') ?>">Inscreve-te</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Recuperar password</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="Painel/recuperarPassword" method="POST">
	      	<div class="modal-body">
	        
	        	<label class="form-control">Insira o seu email:</label>
	        	<input class="form-control" type="email" name="email">
	       
	     	 </div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	        	<button type="submit" class="btn btn-primary">Recuperar</button>
	      	</div>
	    </div>
		</form>
	  </div>
	</div>
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

