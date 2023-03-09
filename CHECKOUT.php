<html>
<?php 
include("Controller/header.php");
include("Controller/log.php");
require_once("Model/USER.php");
session_start();
if(!isset($_SESSION['user'])){
	header("location:login.php");
}

?>
<body>
<?php
include("Controller/nav.php");
?>
<div class="container mt-5">
	<form action="confirm.php" method="POST">
		<input type="hidden" name="id" value="<?= $_GET['product'] ?>">
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="paymentmethod" id="paymentmethod1" value="Cash on Deliver" checked="">
		  <label class="form-check-label" for="paymentmethod">
		    Cash on Delivery
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="paymentmethod" value="Debit/Credit Card" id="paymentmethod2">
		  <label class="form-check-label" for="paymentmethod">
		    Debit/Credit Card
		  </label><br>
			<label for="ccnumber">Credit card number</label>
	    <input type="number" class="form-control ccinfo" name="ccnumber" id="ccnumber" placeholder="Enter Credit Card Number" onclick="required()">
	    <label for="expirationdate">Expiration Date</label><br>
			<select class="form-control-sm ccinfo">
			  <option value="" disabled selected>DD</option>
			  <?php
			  for($i = 1; $i<13; $i++){
			  ?>
			  <option value="<?= $i ?>"><?= str_pad($i,2,'0',STR_PAD_LEFT) ?></option>
			  <?php
			  }
			  ?>
			</select>
			/
			<select class="form-control-sm ccinfo">
				<option value="" disabled selected>YY</option>
				<?php
				for($i=21; $i<=99; $i++){
				?>
				<option value="<?= $i ?>"><?= $i ?></option>
				<?php	
				}
				?>
			</select><br><br> 
	    <label for="cvv">CVV</label>
	    <input type="text" class="form-control ccinfo" maxlength="3" name="ccv" id="cvv" placeholder="Enter CVV">
		</div>
		<div class="form-group">
			 <label for="address">Address</label>
	    	<input required type="text" class="form-control" name="address" id="address" placeholder="Enter address">	
		</div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<script type="text/javascript">
	jQuery.fn.ForceNumericOnly =
	function()
	{
	    return this.each(function()
	    {
	        $(this).keydown(function(e)
	        {
	            var key = e.charCode || e.keyCode || 0;
	            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
	            // home, end, period, and numpad decimal
	            return (
	                key == 8 || 
	                key == 9 ||
	                key == 13 ||
	                key == 46 ||
	                key == 110 ||
	                key == 190 ||
	                (key >= 35 && key <= 40) ||
	                (key >= 48 && key <= 57) ||
	                (key >= 96 && key <= 105));
	        });
	    });
	};
	function pad(num, size) {
	    num = num.toString();
	    while (num.length < size) num = "0" + num;
	    return num;
	}
	$(document).ready(function(){
		$("#paymentmethod2").click(function(){
			$(".ccinfo").prop("required", "true");
		});
		$("#paymentmethod1").click(function(){
			$(".ccinfo").removeAttr("required");
		});
		$("#cvv").ForceNumericOnly();
		$("#cvv").focusout(function(){
			$("#cvv").val(pad($("#cvv").val(),3));
		});
	});
</script>
</body>
</html>