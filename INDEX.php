<?php
require_once("Model/USER.php");
session_start();
$Connection = new Connection();
$con = $Connection->buildConnection();
$rs = $con->query("SELECT * FROM products");
?>
<html>
<?php 
include("Controller/header.php");
?>
<body>
<?php
if(isset($success)){
?>
<div class="jumbotron">
	<ul>
		<?php
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
include("Controller/nav.php");
?>
<div class="shopcon pt-5">
	<div class="row">
		<?php
		while($fetch = $rs->fetch_assoc()){
		?>
		<div class="col-4">
			<div class="productcontainer text-center mx-auto">
				<div>
					<img src="img/<?= $fetch['product_id'] . "." . $fetch['product_image'] ?>" class="productimg">
					<div class="middle">
						<div class="productinfo"><?= $fetch['product_name'] ?><br>₱<?= number_format($fetch['product_price'], 2) ?><br>
							<a href="checkout.php?product=<?= $fetch['product_id'] ?>"><button class="btn btncolor">Purchase</button></a>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</div>
</body>
</html>