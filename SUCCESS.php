<?php 
include("log.php");
require_once("Model/USER.php");
session_start();
if(!isset($_SESSION['user'])){
	header("location:login.php");
}
$log = "Username: " . $_SESSION['user']->username . " Checked out";

logger($log);
?>
<html>
<?php 
include("Controller/header.php");
?>
<body>
<?php
include("Controller/nav.php");
?>
	<div class="jumbotron">
		<a href="index.php"><button class="btn btncolor">Shop Again</button></a>
	</div>
</body>
</html>
