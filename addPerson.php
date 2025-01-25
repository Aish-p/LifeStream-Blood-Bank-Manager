<?php
session_start();
$_SESSION["tab"] = "Add Person";

if($_SESSION["login"] != 1)
    echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
    include_once('header.php');
    $name = $_POST['name'];  
    $phone = $_POST['phone'];  
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];
    $pin = $_POST['pin'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $street = $_POST['street'];
    $med_issues = $_POST['med_issues'];
    $addhar = $_POST['addhar'];
    
    $sql_addhar="select * from person where (p_addhar='$addhar');";

      $res=mysqli_query($con,$sql_addhar);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
		if($addhar==isset($row['p_addhar']))
		{
			echo "PERSON WITH THE ENTERED ADDHAR IS ALREADY EXISTING !";
		}
		}
        else {
	

    $sql = "insert into Person (p_name,p_phone, p_dob, p_gender, p_blood_group, p_med_issues, p_pincode, p_city, p_state, p_street, p_addhar) values('$name', '$phone', '$dob', '$gender', '$blood_group', '$med_issues', '$pin' , '$city', '$state', '$street', '$addhar')"; 
    $sql_1 = "update person set p_age = date_format(from_days(datediff(now(),p_dob)), '%y') + 0"; 

    if (($con->query($sql) === TRUE) and ($con->query($sql_1) === TRUE)) {
        echo 'CONGRATULATIONS!!';
        $sql = "select p_id from Person where p_name ='$name' and p_phone = '$phone' and p_gender = '$gender' and p_dob = '$dob' and p_age and p_blood_group = '$blood_group'  and p_med_issues = '$med_issues' and p_pincode = $pin and p_city = '$city' and p_state = '$state' and p_street = '$street' and p_addhar = '$addhar'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  
        $pid = $row['p_id'];
         
    }
    else 
        echo "Error: " . $sql . "<br>" . $con->error;
        ###########contents of div goes here###########

    if($count == 1){  
        echo'<h2>' .$name .'</h2><br><br>';
        echo 'Your registration is succesful..<br><br>';
        echo'Personal Id : '.$pid .'<br><br>';
        echo'Name : '.$name .'<br><br>';
        echo'Addhar : '.$addhar .'<br><br>';    
        echo 'Phone Number: ' .$phone .'<br><br>';
        echo 'DOB : ' .$dob .'<br><br>';
        echo 'Blood Group : ' .$blood_group .'<br><br>';

        echo 'Gender : ';
        if ($gender === 'm')
            echo 'Male<br><br>'; 
        if ($gender === 'f')
            echo 'Female<br><br>'; 
        if ($gender === 'o')
            echo 'Others<br><br>'; 
    
        echo 'Pincode : ' .$pin .'<br><br>';
        echo 'City : ' .$city .'<br><br>';
        echo 'State : ' .$state .'<br><br>';
        echo 'Street : ' .$street .'<br><br>';
        echo 'Medical Issues : ' .$med_issues .'<br><br>';
        if ($med_issues === "")
            echo 'None<br><br>';
        echo '<div style ="color:red;">NOTE: Please keep your Personal Id for future reference!!!';
    }
}
        ##################################################
    include_once('footer.php');
}
?>