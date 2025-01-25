<?php
session_start();
$_SESSION["tab"] = "Update Person";

if($_SESSION["login"] != 1)
	echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
	include_once('header.php');

###########contents of div goes here###########
	echo '
	<form name="updatePerson" action = "updatePerson.php"  method = "POST">
	<h2>Update Person</h2>
	<br>

	<p>  
	<label>Enter Personal ID: </label>  
	<br>
	<input type = "text" name  = "pid" class="input" required/>  
	</p>

    <p>  
	<label>Phone Number: </label>  
	<br>
	<input type = "tel" name  = "phone" placeholder="9876543210" pattern="[0-9]{10}" class="input"/>  
	</p> 

    <p>
	<label>Pincode:</label><br>
	<input type="text" name="pin" pattern="[0-9]{6}" maxlength="6" placeholder = "Pin code" class="input"/>
	</p>

	<p>  
	<label>City: </label>  
	<br>
	<input type = "text" name  = "city" class="input"/>  
	</p>

	<p>  
	<label>State: </label>  
	<br>
	<input type = "text" name  = "state" class="input"/>  
	</p>

	<p>  
	<label>Street: </label>  
	<br>
	<input type = "text" name  = "street" class="input"/>  
	</p>

	<p>
	<label>Medical Issues(if any):</label>
	<br>
	<textarea rows="5" cols="30" name="med_issues" class="input area"></textarea>
	</p>

	<p>
	<button class="btn">Submit</button>
	</p>
	</form>';

##################################################
	include_once('footer.php');
}
?>