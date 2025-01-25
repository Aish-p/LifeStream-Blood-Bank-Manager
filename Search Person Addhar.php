<?php
session_start();
$_SESSION["tab"] = "Search Person Addhar";

if($_SESSION["login"] != 1)
	echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
	include_once('header.php');

###########contents of div goes here###########
	echo '
	<form name="searchPerson" action = "searchPersonAddhar.php"  method = "POST">
	<h2>Search Person Addhar</h2>
	<br>

    <p>  
	<label>Addhar Number: </label>  
	<br>
	<input type = "text" name  = "addhar" placeholder="3675-9834-6012" pattern="[2-9]{1}[0-9]{3}-[0-9]{4}-[0-9]{4}" class="input" required/>  
	</p>

	<p>
	<button class="btn">Submit</button>
	</p>
	</form>';

##################################################
	include_once('footer.php');
}
?>
