<?php  
#user version

include('connection.php');

echo '
<!DOCTYPE html>
<html>
<head>
<title>
Blood Bank Management System
</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="header">
<div class ="title">
<img src="res/images/logo.png" height = "45" width="45" align="top">
&nbsp;
BLOOD BANK MANAGEMENT SYSTEM

</div><br>
<a href="logout.php">
<button class="btn logout">
Logout
</button></a>
</div>

<div class="container">
<center>
<ul class="tabsWraper">
<li class="tabs">';

if  ($_SESSION["tab"] == "Home")
	echo'<a href="Home.php" class = "active">Home</a>';    
else
	echo'<a href="Home.php">Home</a>';
echo '</li><li class="tabs">';

if  ($_SESSION["tab"] == "Request Blood")
	echo'<a href="Request Blood.php" class = "active">Request Blood</a>';
else
	echo'<a href="Request Blood.php">Request Blood</a>';
echo '</li><li class="tabs">';

if  ($_SESSION["tab"] == "My profile")
	echo'<a href="my profile.php" class = "active">My Profile</a>';
else
	echo'<a href="My Profile.php">My Profile</a>';
echo '</li><li class="tabs">';

?>
</ul>
</center>

<div class="contents">