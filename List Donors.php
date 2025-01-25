<?php
session_start();
$_SESSION["tab"] = "List Donors";
if($_SESSION["login"] != 1)
	echo '<h2>Access denied!!!</h2>';
else{
	include_once('header.php');
?>

	<form name="listDonors" action = "listDonors.php"  method = "POST">
	<h2>Listing Donors</h2>
	<br>

	<?php
	if(isset($_SESSION["entry_error"])){
		echo "<p class='error'>" .$_SESSION["entry_error"]. "</p>";
		unset($_SESSION["entry_error"]);
	}
	?>
	
	<p>
	<label>Blood Group:</label>
	<br>
	<select name="blood_group" class="input" required>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="O+">O+</option>
	<option value="O-">O-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>

	</select>
	</p>
	
	<p>
	<button class="btn">Submit</button>
	</p>
	</form>

<?php
	include_once('footer.php');
}
?>
