<?php
session_start();
$_SESSION["tab"] = "Home";

if($_SESSION["login"] != 1)
	echo '<h2 txtcolor="red">Authentication Error!!!</h2>';

else  
{   
	#echo "Sucess" ;
}

	if($_SESSION["username"] == 'SuperAdmin'){
		include_once('header.php');

		###########contents of div goes here###########
		echo "
		<h2>
		why donate blood ?
		</h2>
		<p>
		Blood is the most precious gift that anyone can give to another person the gift of life. 
		A decision to donate your blood can save a life, or even several if your blood is separated into its components  red cells, platelets and plasma  which can be used individually for patients with specific conditions.
		</p>
		<p>
		<h2>Who Can donate ?</h2><br>
		You must be in good health at the time you donate. You cannot donate if you have a cold, flu, sore throat, cold sore, stomach bug or any other infection. 
		If you have recently had a tattoo or body piercing you cannot donate for 6 months from the date of the procedure.
		</p>
		<h2>
		Our Goal  
		</h2>
		<p>";
	
	
		$sql = "select count(p_id) from Person";
		$result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_array($result);  
		echo "We have got registrations from ".$row[0] ." people";
		$sql = "select count(p_id) from Donation";
		$result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_array($result);  
		echo "<br>We got donations of about ".$row[0] ." from registered persons";
		$sql = "select count(p_id) from Receive";
		$result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_array($result);  
		echo "<br>We gave blood for around ".$row[0] ." times to the registered people from our stock in case of emergency<br>";
		echo "We are glad to say that we have made a successful service to the society</p>";
	
	
			##################################################
		include_once('footer.php');

	}
		

	else {
		include_once('header1.php');

		###########contents of div goes here###########
		echo "
		<h2>
		why donate blood ?
		</h2>
		<p>
		Blood is the most precious gift that anyone can give to another person the gift of life. 
		A decision to donate your blood can save a life, or even several if your blood is separated into its components  red cells, platelets and plasma  which can be used individually for patients with specific conditions.
		</p>
		<p>
		<h2>Who Can donate ?</h2><br>
		You must be in good health at the time you donate. You cannot donate if you have a cold, flu, sore throat, cold sore, stomach bug or any other infection. 
		If you have recently had a tattoo or body piercing you cannot donate for 6 months from the date of the procedure.
		</p>
		<h2>
		Our Goal  
		</h2>
		<p>";


		$sql = "select count(p_id) from Person";
		$result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_array($result);  
		echo "We have got registrations from ".$row[0] ." people";
		$sql = "select count(p_id) from Donation";
		$result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_array($result);  
		echo "<br>We got donations of about ".$row[0] ." from registered persons";
		$sql = "select count(p_id) from Receive";
		$result = mysqli_query($con, $sql);  
		$row = mysqli_fetch_array($result);  
		echo "<br>We gave blood for around ".$row[0] ." times to the registered people from our stock in case of emergency<br>";
		echo "We are glad to say that we have made a successful service to the society</p>";


		##################################################
		include_once('footer.php');
	}


?>
