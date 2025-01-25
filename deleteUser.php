<?php
session_start();
$_SESSION["tab"] = "Delete User";

if ($_SESSION["login"] != 1)
	echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else {
	include_once('header.php');

	$super_pwd = $_POST['super_pwd'];
    $username = $_POST['username'];

	$err = FALSE;

	if (!$err) {
		$sql = "select * from User where username = 'SuperAdmin' and password = '$super_pwd'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if ($count != 1) {
			echo "Invalid Super Admin Password <br>";
			$err = 1;
		}
        else
            echo "Sucessfully Authenticated Super Admin !<br><br><br>";
	}

    if (!$err) {
		$sql = "select * from User where username  = '$username'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if ($count != 1) {
			echo "Invalid Username <br>";
			$err = 1;
		}
        else
            echo "Sucessfully Authenticated username !<br><br><br>";
	}
    
	if (!$err) {
		$sql = "delete from User where username = '$username'";

		if ($con->query($sql) === TRUE) {

			echo 'User Deleted Successfully <br><br><br>';
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}

    if (!$err) {
        echo'<h3>List of Users</h3><br>';
    
            $sql = "select username from User where username != 'SuperAdmin'"; 
    
            $result = mysqli_query($con, $sql);  
    
    
            if ($result->num_rows > 0) {
                echo "<table><tr><th>Users</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["username"]. "</td></tr>";
                }
                echo "</table> <br><br>";
            }
    
            else
                echo "No Users Yet";  
        }
	include_once('footer.php');

}
?>