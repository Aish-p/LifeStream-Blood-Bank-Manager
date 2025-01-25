<?php
session_start();
$_SESSION["tab"] = "New Donation";

if($_SESSION["login"] != 1)
    echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
    include_once('header.php'); 
    $pid = $_POST['pid'];  
    $units = $_POST['units']; 
    date_default_timezone_set("Asia/Calcutta"); 
    $date = date('y-m-d');
    $time = date('h:i');
    $nextDonate_date = date('y-m-d');

    $sql_4 = "SELECT distinct donation.p_id FROM DONATION WHERE p_id = '$pid'";
    $result_4 = mysqli_query($con, $sql_4);
    $row = mysqli_fetch_array($result_4);
    $count = mysqli_num_rows($result_4);

    if ($count != 1)  {
        $sql_5 = "insert into Donation (p_id, d_date, d_time, d_quantity ,d_nextDonate_date) values('$pid', '$date', '$time', '$units' ,DATE_ADD(d_date, INTERVAL 6 MONTH))"; 
        $result5 = $con->query($sql_5);
        echo 'your donation is succesful';
    }

    else{
    $sql_3 = "SELECT donation.p_id , max(d_nextDonate_date)
    FROM DONATION , PERSON
    WHERE donation.p_id = '$pid' AND person.p_med_issues not like 'no%'
    GROUP BY donation.p_id
    HAVING max(d_nextDonate_date) <= curdate()";

    $result = mysqli_query($con, $sql_3);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);


    if ($count != 1)  {
        echo 'Sorry to inform thet you are not eligible to donate!';  
    }

    else {  
    $sql_1 = "insert into Donation (p_id, d_date, d_time, d_quantity ,d_nextDonate_date) values('$pid', '$date', '$time', '$units' ,DATE_ADD(d_date, INTERVAL 6 MONTH))";  
    
    if ($con->query($sql_1) === TRUE) {
###########contents of div goes here###########
        echo 'your donation is succesful';
###############################################
    }
    else {
        #echo "Error: " . $sql . "<br>" . $con->error;
    }
}
    }
    include_once('footer.php');
}
?>