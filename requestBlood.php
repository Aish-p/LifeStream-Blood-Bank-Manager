<?php
session_start();
$_SESSION["tab"] = "Request Blood";

if($_SESSION["login"] != 1)
    echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
    include_once('header1.php');
    
    $pid = $_POST['pid'];  
    $units = $_POST['units']; 
    $hospital = $_POST['hospital']; 
    $blood_group = $_POST['blood_group'];

    date_default_timezone_set("Asia/Calcutta"); 
    $date = date('y-m-d');
    $time = date('h:i');

    $sql_3 = "select s_quantity as qty from stock where s_blood_group = '$blood_group'";
    $query = mysqli_query($con, $sql_3);
    $result = mysqli_fetch_assoc($query);

    echo 'available quantity : '  .$result['qty'].'<br><br>';
    echo 'units requested : ' .$units. '<br><br>';

    if ($result['qty'] >= $units) {
    $sql_1 = "insert into Receive (p_id, r_date, r_time, r_quantity, r_hospital ,r_blood_group) values('$pid', '$date', '$time', '$units', '$hospital', '$blood_group')";  
    }

    
    if ($con->query($sql_1) === TRUE)  {
                ###########contents of div goes here###########
        echo 'your Receiving is succesful';
                ###############################################
    }
    else {
        echo "We are sorry to inform you that we do not have stock";
        //echo "Error: " . $sql . "<br>" . $con->error;
    }
    include_once('footer.php');
}
?>  