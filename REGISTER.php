<?php
require_once("Model/USER.php");
session_start();
if(isset($_SESSION['errors'])){
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}
include("Controller/log.php");

?>
<html>
<?php 
include("Controller/header.php");
?>
<body style="margin: auto;">
<?php
if(isset($errors)){
?>
<div class="jumbotron">
	<ul>
		<?php
		foreach ($errors as $key => $value) {
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
		<form action="Controller/register.php" method="POST">
		<h3>Register</h3><hr>
		  <div class="form-group">
		    <label for="firstname">First Name:</label>
		    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter First Name" required>
		  </div>
		  <div class="form-group">
		    <label for="middlename">Middle Name:</label>
		    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter Last Name" required>
		  </div>
		  <div class="form-group">
		    <label for="lastname">Last Name:</label>
		    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Last Name" required>
		  </div>
		  <div class="form-group">
		    <label for="suffix">Suffix:</label>
		    <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Enter Last Name" required>
		  </div>
		  <div class="form-group">
		    <label for="username">Username:</label>
		    <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
		  </div>
		  <div class="form-group">
		    <label for="password">Password: </label>
		    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
		  </div>
		  <div class="form-group">
		    <label for="password2">Re-Enter Password: </label>
		    <input type="password" name="password2" class="form-control" id="password2" placeholder="Enter Password" required>
		  </div>
		  <input type="submit" class="btn btn-primary" value="Register">
		</form>	
	</div>
</body>
</html>