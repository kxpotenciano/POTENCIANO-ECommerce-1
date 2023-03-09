<?php
require_once("Model/USER.php");
session_start();
if(isset($_SESSION['errors'])){
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}
if(isset($_SESSION['success'])){
	$success = $_SESSION['success'];
	unset($_SESSION['success']);
}



?>

<html>
<?php 
include("Controller/header.php");
?>
<body style="margin: auto;">
<?php
include("Controller/nav.php");
?>	
<?php
if(isset($errors) || isset($success)){
?>
<div class="jumbotron">
	<ul>
		<?php
		if(!empty($errors))
		foreach ($errors as $key => $value) {
		?>
		<li><?= $value ?></li>
		<?php
		}
		if(!empty($success))
		foreach ($success as $key => $value) {
		?>
		<li><?= $value ?></li>
		<?php
		}
		?>
	</ul>
</div>
<?php
}
?>
<div class="container" style="margin-top: 35px; border: 1px solid; border-color: #E1E1E1; padding: 30px; width: 500px; background: white;">
	<form action="Controller/login.php" method="POST">
	<h3>Login</h3><hr>
	  <div class="form-group">
	    <label for="username">Username:</label>
	    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
	  </div>
	  <div class="form-group">
	    <label for="password">Password: </label>
	    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
	  </div>
	  	<div class="row">
	  		<div class="col-3">
	  			<input type="submit" class="btn btn-primary" value="Login">
	  		</div>
	  		<div class="col-9 mt-1">
				<i>Don't have an account yet? </i>
				<a href="register.php">Sign-up here</a>
			</div>
		</div>
	</form>	
</div>
</body>
</html>