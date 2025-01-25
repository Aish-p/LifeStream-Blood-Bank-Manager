<?php
session_start();
$_SESSION["tab"] = "List Donors";

if($_SESSION["login"] != 1)
    echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
    include_once('header.php');

    $blood_group = ' ';
    $blood_group = $_POST['blood_group'];

    if($blood_group == 'A+')
    {
    #echo 'A+';
    $sql_1 = "CALL Donors('A+')"; 
	$result_1 = mysqli_query($con, $sql_1);
    }

    else if($blood_group == 'A-')
    {
    #echo 'A-';
    $sql_2 = "CALL Donors('A-')"; 
	$result_2 = mysqli_query($con, $sql_2);
    }

    else if($blood_group == 'B+')
    {
    #echo 'B+';
    $sql_3 = "CALL Donors('B+')"; 
	$result_3 = mysqli_query($con, $sql_3);
    }

    else if($blood_group == 'B-')
    {
    #echo 'B-';
    $sql_4 = "CALL Donors('B-')"; 
	$result_4 = mysqli_query($con, $sql_4);
    }

    else if($blood_group == 'AB+')
    {
    #echo 'AB+';
    $sql_5 = "CALL Donors('AB+')"; 
	$result_5 = mysqli_query($con, $sql_5);
    }

    else if($blood_group == 'AB-')
    {
    #echo 'AB-';
    $sql_6 = "CALL Donors('AB-')"; 
	$result_6 = mysqli_query($con, $sql_6);
    }

    else if($blood_group == 'O+')
    {
    #echo 'O+';
    $sql_7 = "CALL Donors('O+')"; 
	$result_7 = mysqli_query($con, $sql_7);
    }

    elseif($blood_group == 'O-')
    {
    #echo 'O-';
    $sql_8 = "CALL Donors('O-')"; 
	$result_8 = mysqli_query($con, $sql_8);
    }

    
    $sql = "select * from Donor_list";  
    
    $result = $con->query($sql);
    

    if ($result->num_rows > 0) {

        echo "<h2>Donor list</h2><br>";    
        echo "<table><tr><th>Id</th><th>Name</th><th>Blood Group</th><th>Phone</th></tr>";

            // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["p_id"]. "</td><td>" . $row["p_name"]."</td><td>" . $row["p_blood_group"]."</td><td>" . $row["p_phone"]."</td></tr>";
        }
        echo "</table>";
    }



}
?>