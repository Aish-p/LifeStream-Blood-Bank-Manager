<?php
session_start();
$_SESSION["tab"] = "My Profile";

if($_SESSION["login"] != 1)
    echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
    include_once('header1.php'); 
    
    $pid = $_POST['pid'];
    $addhar = $_POST['addhar']; 

    $sql = "select * from person where p_id = '$pid' and p_addhar = '$addhar'";  

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);


    if($count == 1){  
        $pname = $row['p_name'];
        $phone = $row['p_phone'];
        $gender = $row['p_gender'];    
        $dob = $row['p_dob'];
        $blood_group = $row['p_blood_group'];
        $pin = $row['p_pincode'];
        $city = $row['p_city'];
        $state = $row['p_state'];
        $street = $row['p_street'];
        $med_issues = $row['p_med_issues'];


###########contents of div goes here###########


        echo'<h2>' .$pname .'</h2><br><br>';
        echo'Personal Id : '.$pid .'<br><br>';
        echo'Name : '.$pname .'<br><br>';
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
        echo 'Medical Issues : ' .$med_issues .'<br><br>';;
        if ($med_issues === "")
            echo 'None<br><br><br>';



        echo'<h3>Donation History</h3><br>';

        $sql = "select * from Donation where p_id = '$pid'";  

        $result = mysqli_query($con, $sql);  


        if ($result->num_rows > 0) {
            echo "<table><tr><th>Date of Donation</th><th>Time of Donation</th><th>Units of blood</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["d_date"]. "</td><td>" . $row["d_time"]."</td><td>" .$row["d_quantity"] ."</td></tr>";
            }
            echo "</table> <br><br>";
        }

        else
            echo "No donations Yet";

        echo'<h3>Receiving History</h3><br>';

        $sql = "select * from Receive where p_id = '$pid'";  

        $result = mysqli_query($con, $sql);  


        if ($result->num_rows > 0) {
            echo "
            <table>
            <tr>
            <th>Date of Receive</th>
            <th>Time of Receive</th>
            <th>Units of blood</th>
            <th>Hospital</th>
            <th>Blood Group</th>
            </tr>";

            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                <td>" . $row["r_date"]. "</td>
                <td>" . $row["r_time"]."</td>
                <td>" .$row["r_quantity"] ."</td>
                <td>" .$row["r_hospital"] ."</td>
                <td>" .$row["r_blood_group"] ."</td>
                </tr>";
            }
            echo "</table> <br>";
        }

        else
            echo "No Receives Yet";

    }  
    else{
        echo 'Person with pid: ' .$pid .' and addhar: ' .$addhar . ' are not matched !
        <br><br>Please Provide Valid Credentials';
    }
    include_once('footer.php');
}
?>  