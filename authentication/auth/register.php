<?php
    include('app/User.php');
    include('guest.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = new User;

    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password']; 
    

    if($user->register()){
		header('location:login.php?msg=login');
        $status =  "user registered";
    }
    else{
        $status = "Unable to register user";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Page</title>
	<link rel="stylesheet" href="../css/style.css">
	
	<!-- font awesome css for Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <h2><?php echo $status; ?></h2>
	<div class="container">
        
		<div class="overlay">

		</div>
		<div class="login-wrapper">

			<div class="header">
				<h2>Register</h2>
				<ul class="social-buttons">
					<li><a href="#"><i class="fab fa-google"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#"><i class="fab fa-facebook"></i></a></li>
					
				</ul>
			</div>

			<div class="form-container">
				<form action="register.php" method="POST">
					
					<div class="input-group">
						<span><i class="fa fa-user-circle"></i></span>
						<input type="text" placeholder="Name" name="name" class="text">
					</div>

                    <div class="input-group">
						<span><i class="fa fa-user"></i></span>
						<input type="email" placeholder="Email" name="email" class="text">
					</div>

					<div class="input-group">
						<span><i class="fa fa-lock"></i></span>
						<input type="password" placeholder="Password" name="password" class="text">
					</div>

					<div class="check-group">
						<input type="checkbox" id="check-remember">
						<label for="check-remember">Remember me</label>
					</div>

					<div class="button-group">
						<button>Login</button>
						<a href="#">Forget Password ?</a>
					</div>

				</form>

				<p>Don't have an account ? <a href="login.php">Login Here</a></p>

			</div>

		</div>
	</div>
	
</body>
</html>