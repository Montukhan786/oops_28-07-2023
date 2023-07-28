<?php
    // session_start();
    include('app/User.php');
    include('guest.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = new User;

    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    

    if($user->login()){
        // $_SESSION['user_id'] = $user->id;
        header('location:../oop/index.php?msg=login_success');
        // echo "You are loggedIn";
    }
    else{
		?>
        <script>
			alert("Invalid Password");
		</script>
		<?php
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Responsive Login form using html and css</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	
	<!-- font awesome css for Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<meta name="xyz" />
</head>
<body>


	<div class="container">
		<?php
			if (isset($_GET['msg']) == "login") {
				echo "<div class='alert alert-success alert-dismissible'>
							Your Registration successfully,please login with your credentials. 
						</div>";
			}
		?>
		
		<div class="overlay">

		</div>
		<div class="login-wrapper">

			<div class="header">
				<h2>Login</h2>
				<ul class="social-buttons">
					<li><a href="#"><i class="fab fa-google"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#"><i class="fab fa-facebook"></i></a></li>
					
				</ul>
			</div>

			<div class="form-container">
				<form action="login.php" method="POST">
					<div class="input-group">
						<span><i class="fa fa-user"></i></span>
						<input type="text" placeholder="Email" name="email" class="text">
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

				<p>Don't have an account ? <a href="register.php">Sign Up</a></p>

			</div>

		</div>
	</div>
	
</body>
</html>