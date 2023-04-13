<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_name = $_SESSION['user_name'];
    }else{
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Navigation Bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="dashboard.php">Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="dashboard.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../Controller/LogoutController.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Main Content -->
	<div class="container">
		<h1>Welcome <?php echo $user_name;?></h1>
		<p>Welcome to our website! We're thrilled that you've chosen to visit us today. We hope that our website provides you with the information and resources you need, and we're here to assist you every step of the way.</p>
	</div>

</body>
</html>

