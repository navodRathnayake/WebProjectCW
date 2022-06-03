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

$ID = (int)$_POST['ID'];

// sql to delete a record
$sql = "DELETE FROM employee WHERE id=".$ID."";

if ($conn->query($sql) === TRUE) {
   echo "<script type='text/javascript'>alert('Record has deleted successfull!');</script>";
} else {
	echo "<script type='text/javascript'>alert('Cannot delete the record');</script>";
  	echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" href="css/delete_style.css">


<style type="text/css">
			input[type=number] , input[type=email] , input[type=tel]  
		{
	 		background-color: rgb(212, 207, 207);
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



		input[type=submit] , input[type=reset]
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


</head>

<div class="window">
	<table border="0px" width="600" height="100";>
		<tr>
			
			<td>
			<div class= "head"><h1>Delete</h1></td>
			</div>
		</tr>
		<tr>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<table border="0px"  width="100%" style= "padding: 50px";>
	<tr>
		<td><label for="ID"style= "color: red">ID</label></td>
		<td><input type="number" name="ID" placeholder="ID"></td>
	</tr>
	<tr>
		<td><input type="submit" value="Submit"style= "background-color:cornflowerblue"></td>
		<td><input type="reset" value="Clear"style= "background-color:cornflowerblue"></td>
	</tr>
</table>
</form>

</body>
</html>