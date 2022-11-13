<!doctype html>
<?php session_start();?>
<html lang="en">
  <head>
<?php 
try{$connection = new mysqli("localhost","root","","mysql");} catch(Exception $exception){echo "Error connecting to database";exit();}
$sessionId = session_id();
$resultObject = $connection->query("SELECT username,password from sessions where sessionID = '$sessionId' ");
$resultString = mysqli_fetch_row($resultObject);

 ?>
  	<title>Login 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body style="background-image:url(images/background.jpg);height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div style="display:flex;justify-content:center">
					<img src="images/logo.png"  width="100" height="90">
		      	</div>
		      	<h3 class="text-center mb-4"><b>Prijavi se<b></h3>
						<form method="post"action="authentication.php" class="login-form">
		      		<div class="form-group">
		      			<input type="text" value = <?php if(isset($resultString)) {echo $resultString[0];} else{echo '';} ?>  name = "username" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" value = <?php if(isset($resultString)) {echo $resultString[1];} else{echo '';} ?> name= "password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input name = "rememberMe" type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
									<label>
									<a style ="color:red" href="register.php"><b>Registruj se<b></a>
									</label>
								</div>
	            </div>
	          </form>
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

