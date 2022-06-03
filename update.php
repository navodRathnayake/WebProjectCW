<?php


error_reporting(0);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad";


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "update employee set firstName = '".$firstName."' , lastName = '".$lastName."' ,email = '".$email."' , phone = '".$phone."' where ID = ".$_POST['ID']."";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>alert('Update was successfull!');</script>";
} else {
	echo "Error updating record: " . $conn->error;
  echo "<script type='text/javascript'>alert('Cannot update Database!');</script>";
}

$conn->close();
}



?>



<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
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


		input[type=number] , input[type=email] , input[type=tel] , input[type=text]  
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



	</style>
	<meta charset="utf-8">
	<title></title>

	<link rel="stylesheet" href="css/update_style.css">
</head>
<body>
<div class="window">
	<table border="0px" width="600" height="100";>
		<tr>
			
			<td>
			<div class= "head"><h1>Update</h1></td>
			</div>
		</tr>
		<tr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				<table border="0px"  width="100%" style= "padding: 50px";>
					<tr>
						<td><label for="ID"style= "color: red">ID</label></td>
						<td><input type="number" name="ID" placeholder="ID Number"></td>
					</tr>
					<tr>
						<td><label for="firstName"style= "color: red">First Name</label></td>
						<td><input type="text" id="firstName" name="firstName" placeholder="FirstName"></td>
					</tr>
					<tr>
						<td><label for="lastName"style= "color: red">Last Name</label></td>
						<td><input type="text" id="lastName" name="lastName" placeholder="LastName"></td>
					</tr>
					<tr>
						<td><label for="email"style= "color: red">Email</label></td>
						<td><input type="email" id="email" name="email" placeholder="example@gmail.com"></td>
					</tr>
					<tr>
						<td><label for="tel"style= "color: red">Telephone</label></td>
						<td>
							<input type="tel" id="phone" name="phone" placeholder="0774441898" pattern="[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" >
						</td>
					</tr>
					<tr>
						<td><label for="gender"style= "color: red">Gender</label></td>
						<td>
						<input type="radio" name="gender" value="male" style="margin-right: 1px"><label for="male" style="margin-left: 1px";>Male</label>
							<input type="radio" name="gender" value="female"style="margin-right: 1px"><label for="female" style="margin-left: 1px">Female</label>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="Submit" style= "background-color:cornflowerblue">
							<input type="reset" value="Clear" style= "background-color:cornflowerblue">
						</td>
					</tr>
				</table>

			</form>
</body>
</html>