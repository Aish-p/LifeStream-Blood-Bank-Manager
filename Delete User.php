<?php
session_start();
$_SESSION["tab"] = "Delete User";

if($_SESSION["login"] != 1)
  echo '<h2 txtcolor="red">Authentication Error!!!</h2>';
else{
  include_once('header.php');

		###########contents of div goes here###########
  
  
  echo'<h3>List of Users</h3><br>';

        $querry = "select username from User where username != 'SuperAdmin'"; 

        $result = mysqli_query($con, $querry);  


        if ($result->num_rows > 0) {
            echo "<table><tr><th>Users</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["username"]. "</td></tr>";
            }
            echo "</table> <br><br>";
        }

        else
            echo "No Users Yet"; 

  echo '
  <form name="Delete User" action = "deleteUser.php"  method = "POST">
  <h2>Delete User</h2>
  <br>
          
  <p>  
  <label>Super Admin Password: </label>  
  <br>
  <input type = "password" name  = "super_pwd" class="input" required/>  
  </p>  
  <p>          
          
  <p>  
  <label>Enter Username to Delete: </label>  
  <br>
  <input type = "Username" name  = "username" class="input" required/>  
  </p>  
  <p>  

  <p>
  <button class="btn">Submit</button>
  </p>
  </form>';

		##################################################
  include_once('footer.php');
}
?>
