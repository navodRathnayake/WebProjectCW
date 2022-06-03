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



if (($_SERVER["REQUEST_METHOD"] == "POST") && (!empty($_POST['firstName'])) && (!empty($_POST['lastName'])) && (!empty($_POST['email'])) && (!empty($_POST['phone'])) && (!empty($_POST['gender'])) )
{

	$AfirstName = $_POST['firstName'];
	$AlastName = $_POST['lastName'];
	$Aemail = $_POST['email'];
	$Aphone = $_POST['phone'];
	$Agender = $_POST['gender'];

	$sql = "INSERT INTO employee (firstName,lastName,email,phone,gender) VALUES('$AfirstName','$AlastName','$Aemail',$Aphone,'$Agender')";


		if ($conn->query($sql) === TRUE) {
  		echo "<script type='text/javascript'>alert('Record has added!');</script>";
		} else {
 			 echo "Error: " . $sql . "<br>" . $conn->error;
		}

$conn->close();

}
else
	{
		echo "<script type='text/javascript'>alert('Fields are empty. Cannot continue the process');</script>";	
	}



?>












<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
a:link, a:visited {
  background-color: #8665f7;
  color: white;
  padding: 14px 50px;
  text-align: center;
  text-decoration: none;
  display: inline-flex;
  
}

a:hover, a:active {
  background-color: #353b48;
}
a{
	
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


select
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



input[type=text] , input[type=email] , input[type=tel]  
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

<link rel="stylesheet" href="css/dashboard_style.css">
</head>
<body>




<div class="window">
	<table border="0px" width="600" height="100%";>
		<tr>
			
			<td>
			<div class= "head"><h1>Dashboard</h1></td>
			</div>
		</tr>
		<tr>

</div>
		
			<td>
			

			
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			
				<table border="0px" width="100%"  >
				
					<tr>
						<td><label for="firstName"style= "color: red">First Name</label></td>
						<td><input type="text" id="firstName" name="firstName" placeholder="FirstName"></td>
					</tr>
					<tr>
						<td><label for="lastName"style= "color: red">Last Name</label></td>
						<td><input type="text" id="lastName" name="lastName" placeholder="LastName"></td>
					</tr>
					<tr>
						<td><label for="email"style= "color: red; background-color:none;">Email</label></td>
						<td><input type="email" id="email" name="email"placeholder="example@gmail.com" ></td>
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
						<td style= "size=20px"; >
							<input type="submit" value="Submit" style= "background-color:cornflowerblue" ;>
							<input type="reset" value="Clear" style= "background-color:cornflowerblue";>
						</td>
					</tr>
					<tr>
						<td colspan="2">
					<a id="update" href="update.php" target="_blank">Update</a>
					<a id="delete" href="delete.php" target="_blank">Delete</a>
					</td>
					</tr>
					
				</table>
				
			</form>
			
				
			</td>
			<td>

			
			
			</td>
		</tr>
		<tr>
			<td>
				
			</td>
		</tr>
		<div class="table">
	</table>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
				
				
					<tr>
						<td colspan="2">
							<h1>Customer's Orders</h1>
						</td>
					</tr>
					<table border="0px" width="600" ;>
				<tr>
					<td style= "background-color: #ddd";>
						<select name="order" id="order" style="background-color:#8665f7";>
  							<option value="today" >Today</option>
  							<option value="all" >All</option>
						</select>
					</td>
					<td style= "background-color: #ddd";><input type="submit"style= "background-color: cornflowerblue;"></td>
				</tr>
				<tr>
					<td colspan="2">






























					</td>
				</tr>
				</form>
			</table>
			</div>
</div>






<p>











<form>

<table border="0px" width="1000"  style="padding:180px";>	
        <tr>
			<td colspan="2">
					<h1>Customer's Comments</h1>
			</td>
		</tr>
			
	<tr >
		<td  style= "background-color: #ddd"; >

			<label for="email"style="background-color:#8665f7";>Email</label><input type="email" id="email" name="email">
			<input type="submit" value="Submit"style= "background-color: cornflowerblue";>
		</td>
	</tr>
	<tr>
	<td>					















	</td>	
	</tr>
	</form>
</table>


<table border="0px" width="100%" style="background-color:LightGray; margin-top: 10px;">
	<tr>
		<th><h3 style="text-align: center; font-weight: bolder;">Results</h3></th>
	</tr>
	<tr>
		<td>
			<?php 

error_reporting(0);

$link = mysqli_connect("localhost", "root", "", "wad");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if($_POST['order'] == 'today')
	{
		$date = date('Y-m-d');

		$sql = "SELECT * FROM booking where bookingDate ='".$date."'";

		if($result = mysqli_query($link, $sql))
		{
    		if(mysqli_num_rows($result) > 0)
    		{
        		echo "<table>";
            	echo "<tr>";
                		echo "<th>First Name</th>";		
						echo "<th>Last Name</th>";		
						echo "<th>Email</th>";		
						echo "<th>ViewPort</th>";		
						echo "<th>mainFood</th>";		
						echo "<th>Drink</th>";		
						echo "<th>Desert</th>";		
						echo "<th>Phone</th>";		
						echo "<th>Members</th>";		
						echo "<th>Booking Date</th>";		
						echo "<th>Booking Time</th>";		
            	echo "</tr>";
        	while($row = mysqli_fetch_array($result))
        	{
            echo "<tr>";
                echo "<td>" . $row['firstName'] . "</td>";
                echo "<td>" . $row['lastName'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['viewport'] . "</td>";
                echo "<td>" . $row['mainFood'] . "</td>";
                echo "<td>" . $row['drink'] . "</td>";
                echo "<td>" . $row['desert'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['members'] . "</td>";
                echo "<td>" . $row['bookingDate'] . "</td>";
                echo "<td>" . $row['bookingTime'] . "</td>";
            echo "</tr>";
       	 	}
        	echo "</table>";
        	// Free result set
       	 	mysqli_free_result($result);
   	 	} 
   	 	else
   	 	{
        echo "<script type='text/javascript'>alert('No records matching your query were found.');</script>";
    	}
	} 
	else
	{
    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
// Close connection
mysqli_close($link);

	}
	elseif ($_POST['order'] == 'all') 
	{
		$sql = "SELECT * FROM booking";

		if($result = mysqli_query($link, $sql))
		{
    		if(mysqli_num_rows($result) > 0)
    		{
        		echo "<table>";
            	echo "<tr>";
                		echo "<th>First Name</th>";		
						echo "<th>Last Name</th>";		
						echo "<th>Email</th>";		
						echo "<th>ViewPort</th>";		
						echo "<th>mainFood</th>";		
						echo "<th>Drink</th>";		
						echo "<th>Desert</th>";		
						echo "<th>Phone</th>";		
						echo "<th>Members</th>";		
						echo "<th>Booking Date</th>";		
						echo "<th>Booking Time</th>";		
            	echo "</tr>";
        	while($row = mysqli_fetch_array($result))
        	{
            echo "<tr>";
                echo "<td>" . $row['firstName'] . "</td>";
                echo "<td>" . $row['lastName'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['viewport'] . "</td>";
                echo "<td>" . $row['mainFood'] . "</td>";
                echo "<td>" . $row['drink'] . "</td>";
                echo "<td>" . $row['desert'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['members'] . "</td>";
                echo "<td>" . $row['bookingDate'] . "</td>";
                echo "<td>" . $row['bookingTime'] . "</td>";
            echo "</tr>";
       	 	}
        	echo "</table>";
        	// Free result set
       	 	mysqli_free_result($result);
   	 	} 
   	 	else
   	 	{
   	 		echo "<script type='text/javascript'>alert('No records matching your query were found.');</script>";
    	}
	} 
	else
	{
    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
 
// Close connection
mysqli_close($link);
			
	}
}


?> 


		</td>
	</tr>
	<tr>
		<td>
			

			<?php

error_reporting(0);

$link = mysqli_connect("localhost", "root", "", "wad");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT name,email,subject,message FROM customer where email = '".$_GET['email']."'";

if ($_SERVER["REQUEST_METHOD"] == "GET"){
	if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Subject</th>";
                echo "<th>Message</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<script type='text/javascript'>alert('No records matching your query were found.');</script>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);	
}


?>	



		</td>
	</tr>
</table>


</body>
</html>