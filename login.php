<?php 

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT userName, password FROM admin";
$result = $conn->query($sql);

if($_SERVER['REQUEST_METHOD'] == 'post')
{
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        

    	if(($_POST['userName'] == $row['userName']) && ($_POST['password'] == $row['password']))
    	{
    		echo "<script type='text/javascript'>alert('You have logged!');</script>";	
    	}
    	else
    	{
    		echo "<script type='text/javascript'>alert('UserName or Password is incorrect!');</script>";
    	}

    }
} else {
    echo "0 results";
}

$conn->close();
}



?>


<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<title></title>

	<style type="text/css">
		input
		{
	 		background-color: #8665f7;
  			border: none;
  			color: white;
  			padding: 16px 32px;
  			text-align: center;
  			text-decoration: none;
  			display: inline-block;
  			font-size: 16px;
  			margin: 4px 2px;
  			transition-duration: 0.4s;
  			cursor: pointer;
		}
	
	</style>

	
	<link rel="stylesheet" href="css/login_style.css">
</head>

<div class="window">
	<table border="0px" width="600" height="100";>
		<tr>
			
			<td>
			<div class= "head"><h1>Admin Login</h1></td>
			</div>
		</tr>
		<tr>
<body>
 
<div class="login-form">
	<form method="post" action="dashboard.php">
		
		
	<table border="0px"  width="100%" style= "padding: 50px";>
		<tr>
			<td><label for="userName"style= "color: red">User Name</label></td>
			<td><input type="text" name="userName" placeholder="UserName"></td>
		</tr>
		<tr>
		    <td><label for="userName"style= "color: red">Password</label></td>
			<td><input type="Password" name="password" placeholder="Password"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" value="Submit"style= "background-color:cornflowerblue">
				<input type="reset" value="Clear"style= "background-color:cornflowerblue">
			</td>
		</tr>
	</table>
	
	</form>
</div>

</body>
</html>