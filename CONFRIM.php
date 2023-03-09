<?php 
include("Controller/header.php");
include("Controller/log.php");
require_once("Model/USER.php");
session_start();
if(!isset($_SESSION['user'])){
	header("location:login.php");
}
$paymentmethod = $_POST['paymentmethod'];
$address = $_POST['address'];
$id= $_POST['id'];
$Connection = new Connection();
$con = $Connection->buildConnection();
$statement = $con->prepare("SELECT * FROM products WHERE product_id=?");
$statement->bind_param("i",$id);
$statement->execute();
$rs = $statement->get_result();
$fetch = $rs->fetch_assoc();
?>
<html>
<?php 
include("Controller/header.php");
?>
<body>
<?php
include("Controller/nav.php");
?>
<div class="shopcon">
	<div class="row">
		<div class="col">
			<div class="confirmcontainer">
				<form action="success.php" method="POST">
					<input type="hidden" name="id" value="<?= $fetch['product_id'] ?>">
					<p><?= $fetch['product_name'] ?></p>
					<p><img src="img/<?= $fetch['product_id'] . '.' . $fetch['product_image'] ?>"></p>
					<p><?= $fetch['product_price'] ?></p>
					<input type="number" name="quantity" id="quantity" value="1" min="1">
					<p id="total_price">₱<?= number_format($fetch['product_price'],2) ?></p>
					<p><?= $paymentmethod ?></p>
					<p><?= $address ?></p>
					<input type="submit" name="checkout" value="Confirm" class="btn btncolor">
				</form>
					<a href="index.php"><button class="btn btncolor">Cancel</button></a>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	var formatter = new Intl.NumberFormat('en-US', {
	  style: 'currency',
	  currency: 'PHP',
	});
	var total_price = <?= $fetch['product_price'] ?>;
	$(document).ready(function(){
		$("#quantity").on("keyup change",function(){
			total_price = <?= $fetch['product_price'] ?> * $(this).val();
			$("#total_price").html(formatter.format(total_price));
		});
	});
</script>
</body>
</html>