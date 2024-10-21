<!-- Rafael Lavoyer RA:22208760 -->
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
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
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(https://i.pinimg.com/736x/60/d9/d5/60d9d548f644e1cad1455a5d3d23b1ea.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Cadastro</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
					<form method="post" action="cadastrar.php" class="signin-form">
                        <div class="form-group mb-3">
                            <div> 
								<?php echo isset($_REQUEST['mensagem']) ? $_REQUEST['mensagem'] : ''  ?> 
							</div>
			      			<label class="label" for="nome"  >Nome</label>
			      			<input type="text" name="nome" class="form-control" placeholder="Nome" required>
			      		</div>
                        <div class="form-group mb-3">
			      			<label class="label"  for="email">E-mail</label>
			      			<input type="text" name="email" class="form-control" placeholder="E-mail" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label"  for="senha">Senha</label>
		                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Criar conta</button>
		            </div>
		          </form>
		          <p class="text-center">Já é membro? <a href="index.php">Logar</a></p>
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

