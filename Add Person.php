<?php
session_start();
$_SESSION["tab"] = "Add Person";
if($_SESSION["login"] != 1)
	echo '<h2>Access denied!!!</h2>';
else{
	include_once('header.php');
?>

	<form name="addPerson" action = "addPerson.php"  method = "POST">
	<h2>New Registration</h2>
	<br>

	<?php
	if(isset($_SESSION["entry_error"])){
		echo "<p class='error'>" .$_SESSION["entry_error"]. "</p>";
		unset($_SESSION["entry_error"]);
	}
	?>
	
	<p>  
	<label>Name: </label>  
	<br>
	<input type = "text" name  = "name" class="input" />  
	</p>  

	<p>  
	<label>Addhar: </label>  
	<br>
	
	<input type = "text" name  = "addhar" placeholder="3675-9834-6012" pattern="[2-9]{1}[0-9]{3}-[0-9]{4}-[0-9]{4}" class="input" required /> 
	
	</p> 

	<p>  
	<label>Phone Number: </label>  
	<br>
	<input type = "tel" name  = "phone" placeholder="9876543210" pattern="[0-9]{10}" class="input" required />  
	</p>  

	<p>  
	<label>Gender:</label><br>
	<input type="radio" id="male" name="gender" value="m" required>
	<label for="male">Male</label><br>

	<input type="radio" id="female" name="gender" value="f" required>
	<label for="female" >Female</label><br>

	<input type="radio" id="other" name="gender" value="o" required>
	<label for="other" >Other</label>
	</p>  

	<p>
	<label>Date of birth: </label>  
	<br>
	<input type = "date" name  = "dob" class="input" required/>  
	</p>  

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
	<label>Pincode:</label><br>
	<input type="text" name="pin" pattern="[0-9]{6}" maxlength="6" placeholder = "Pin code" class="input" required />
	
	</p>

	<p>  
	<label>City: </label>  
	<br>
	<input type = "text" name  = "city" class="input" required />  
	</p>

	<p>  
	<label>State: </label>  
	<br>
	<input type = "text" name  = "state" class="input" required />  
	</p>

	<p>  
	<label>Street: </label>  
	<br>
	<input type = "text" name  = "street" class="input" required />  
	</p>

	<p>
	<label>Medical Issues(if any):</label>
	<br>
	<textarea rows="5" cols="30" name="med_issues" class="input area" required></textarea>
	</p>
	
	<p>
	<button class="btn">Register</button>
	</p>
	</form>

<?php
	include_once('footer.php');
}
?>
