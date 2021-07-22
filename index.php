<?php include 'head.php'; 


$bill = null;
$tip = null;

if ( isset($_POST["submitted"]) ) {

	if ( isset($_POST["bill"]) ) {
		if ($_POST["bill"] >= 0 ) {
			// $bill = $_POST["bill"];
			$bill = number_format((float)$_POST["bill"], 2, '.', '');
		}
	}
	if ( isset($_POST["tip"]) ) {

		if ($_POST["tip"] <= 0 ) {
			$tip = 0;
			$tipWithDemicals = $tip;
			$total = floatval($bill) + $tip;
			$totalDecimal = number_format((float)$total, 2, '.', '');
		}

		if ( $_POST["tip"] > 0  ) {
			$tip = $_POST["tip"];
			$tipAmount = (floatval($bill) * (floatval($tip / 100)) );
			$tipAmount = number_format((float)$tipAmount, 2, '.', '');
			$total = floatval($bill) + (floatval($bill) * (floatval($tip / 100)) );
			$totalDecimal = number_format((float)$total, 2, '.', '');
		}
		echo "<p class='total'>" . "Your bill was " . "<span class='bold'>$" . $bill . "</span>" . " and you tipped " . "<span class='bold'>" . $tip . "%</span>" .  " or $" . $tipAmount . ", which brings your total to " . "<span class='bold'>$" .$totalDecimal . "</span>" . "." . "</p>";
	}

}


?>


<body>

<div class="form-container">
	<div class="inner-column">
		<h1>PHP Tip Calculator</h1>

		<form method="POST">
			<label for="bill">How much was the bill?</label>
			<input 
				type="number" 
				name="bill" 
				id="bill" 
				step="0.01" 
				min= "0";
				placeholder="Bill Amount in $";
			>
		

		
			<label for="tip">How much would you like to tip?</label>
			<input 
				type="number"
				name="tip" 
				id ="tip" 
				step="0.01"
				min= "0"; 
				required="" 
				placeholder="% tip amount";
			>	
			
			<button type="submit" name="submitted"> Calculate Total</button>
		</form>
	</div>

</div>
	
</body>
</html>