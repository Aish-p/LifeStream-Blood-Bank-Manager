<?php
session_start();
$_SESSION["tab"] = "Update Person";

if($_SESSION["login"] != 1)
    echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
    include_once('header.php');

    $pid = $_POST['pid'];  
    $phone = $_POST['phone'];
    $pin = $_POST['pin'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $street = $_POST['street'];
    $med_issues = $_POST['med_issues'];

    $sql_check = "select * from Person where p_id = '$pid'";

    $result_check = mysqli_query($con, $sql_check);
    $row = mysqli_fetch_array($result_check);
    $count = mysqli_num_rows($result_check);

    if ($count == 1) 
    {
    if($phone != "")
    { 
        $sql = "update Person set p_phone = '$phone' where p_id = '$pid'";
        if ($con->query($sql) === TRUE) {

			echo 'User Phone Updated Successfully !<br><br><br>';
    
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
    }
    
        if($pin != "")
        { 
            $sql = "update Person set p_pincode = '$pin' where p_id = '$pid'";
            if ($con->query($sql) === TRUE) {
    
                echo 'User Pincode Updated Successfully !<br><br><br>';

            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
        
        if($city != "")
        { 
            $sql = "update Person set p_city = '$city' where p_id = '$pid'";
            if ($con->query($sql) === TRUE) {
    
                echo 'User City Updated Successfully !<br><br><br>';
                
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        if($state != "")
        { 
            $sql = "update Person set p_state = '$state' where p_id = '$pid'";
            if ($con->query($sql) === TRUE) {
    
                echo 'User state Updated Successfully !<br><br><br>';
                
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        if($street != "")
        { 
            $sql = "update Person set p_street = '$street' where p_id = '$pid'";
            if ($con->query($sql) === TRUE) {
    
                echo 'User street Updated Successfully !<br><br><br>';
                
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        if($med_issues != "")
        { 
            $sql = "update Person set p_med_issues = '$med_issues' where p_id = '$pid'";
            if ($con->query($sql) === TRUE) {
    
                echo 'User Medical Issue Updated Successfully !<br><br><br>';
                
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        if($phone != "" || $pin != "" || $city != "" || $state != "" || $street != "" || $med_issues != "")
        {
        $sql_display = "select * from Person where p_id = '$pid'"; 
        $res = mysqli_query($con, $sql_display);
        
        if ($res->num_rows > 0) {
            echo "<table><tr><th>Name</th><th>Phone</th><th>DOB</th><th>Gender</th><th>Blood Group</th><th>Med Issues</th><th>Age</th><th>Pin Code</th><th>City</th><th>State</th><th>Street</th><th>Addhar</th></tr>";
            while($row = $res->fetch_assoc()) {
                echo "<tr><td>" . $row["p_name"]. "</td><td>" . $row["p_phone"]."</td><td>" . $row["p_dob"]."</td><td>" . $row["p_gender"]."</td><td>" . $row["p_blood_group"]."</td><td>" . $row["p_med_issues"]."</td><td>" . $row["p_age"]."</td><td>" . $row["p_pincode"]."</td><td>" . $row["p_city"]."</td><td>" . $row["p_state"]."</td><td>" . $row["p_street"]."</td><td>" . $row["p_addhar"]."</td></tr>";
            }
            echo "</table> <br><br>";
        }

        else
            echo "No Users Yet to Update";  
    #}
        }
    }
    else{
        echo 'Person with pid: ' .$pid .' not found!
        <br>Please provide a valid personal id to update';
    }
    include_once('footer.php');
}
?>  