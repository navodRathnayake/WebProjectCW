<?php

//connection

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





//connection


$firstName = $lastName = $email = $phone = $bookingDate = $bookingTime = $members = $viewport = $mainFood = $drink = $desert =$fav = "";
$EfirstName = $ElastName = $Eemail = $Ephone = $EbookingDate = $EbookingTime = $Emembers = $Eviewport = $EmainFood = $Edrink =  
$Edesert = $Efav = "Required";

$errorCheck = false;

function addData()
{
	if(isset($_POST['firstName']))
	{
		$errorCheck = true;
		echo "<script type='text/javascript'>console.log(first name);</script>";
	}
	if(isset($_POST['lastName']))
	{
		$errorCheck = true;
	}
	if(isset($_POST['email']))
	{
		$errorCheck = true;
	}
	
	
}

function checkValidness()
{

		global $EfirstName,$ElastName,$Eemail,$Ephone,$EbookingDate,$EbookingTime,$Emembers,$Eviewport,$EmainFood,$Edrink,$Edesert;

	 if (empty($_POST["firstName"])) 
	 {
    $EfirstName = "First Name is required";

   } 
   else {
    $firstName = test_input($_POST["firstName"]);
   }

   if (empty($_POST["lastName"])) 
	 {
    $ElastName = "Last Name is required";
   } 
   else {
    $lastName = test_input($_POST["lastName"]);
   }

   if (empty($_POST["email"])) 
	 {
    $Eemail = "Email is required";
   } 
   else {
    $email = test_input($_POST["email"]);
   }

   if (empty($_POST["phone"])) 
	 {
    $Ephone = "Mobile is required";
   } 
   else {
    $phone = test_input($_POST["phone"]);
   }

   if (empty($_POST["bookingDate"])) 
	 {
    $EbookingDate = "Booking Date is required";
   } 
   else {
    $bookingDate = test_input($_POST["bookingDate"]);
   }

   if (empty($_POST["bookingTime"])) 
	 {
    $EbookingTime = "Booking Time is required";
   } 
   else {
    $bookingTime = test_input($_POST["bookingTime"]);
   }

   if (empty($_POST["members"])) 
	 {
    $Emembers = "Member's count is required";
   } 
   else {
    $members = test_input($_POST["members"]);
   }

   if (empty($_POST["viewport"])) 
	 {
    $Eviewport = "Wishing View is required";
   } 
   else {
    $viewport = test_input($_POST["viewport"]);
   }

   if (empty($_POST["fav"])) 
	 {
    $Efav = "Wishing View is required";
   } 
   else {
    $fav = test_input($_POST["fav"]);
   }


   if(isset($_REQUEST['viewport']) && $_REQUEST['viewport'] == '0') { 
  echo 'Please select a country.'; 
} 



   if (empty($_POST["mainFood"])) 
	 {
    $EmainFood = "Main Food is required";
   } 
   else {
    $mainFood = test_input($_POST["mainFood"]);
   }

   if (empty($_POST["drink"])) 
	 {
    $Edrink = "Drink is required";
   } 
   else {
    $drink = test_input($_POST["drink"]);
   }

   if (empty($_POST["desert"])) 
	 {
    $Edesert = "Desert is required";
   } 
   else {
    $desert = test_input($_POST["desert"]);
   }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  checkValidness();

  $firstName = test_input($_POST["firstName"]);
	$lastName = test_input($_POST["lastName"]);
	$email = test_input($_POST["email"]);
	$phone = test_input($_POST["phone"]);
	$bookingDate = test_input($_POST["bookingDate"]);
	$bookingTime = test_input($_POST["bookingTime"]);
	$bookingDate = test_input($_POST["bookingDate"]);
	$members = test_input($_POST["members"]);
	$viewport = test_input($_POST["viewport"]);
	$mainFood = test_input($_POST["mainFood"]);
	$drink = test_input($_POST["drink"]);
	$desert = test_input($_POST["desert"]);
	//$fav = test_input($_POST['fav']);
	addData();

	
	


	try {
		
		if((!empty($firstName)) && (!empty($lastName)) && (!empty($email)) && (!empty($phone)) && (!empty($bookingDate)) && (!empty($bookingTime)) && (!empty($members)) && (!empty($viewport)) && (!empty($mainFood)) && (!empty($drink)) && (!empty($desert)) ) 
	{
		echo "<script type='text/javascript'>alert('All fields are set!');</script>";

		//$sql = "INSERT INTO order (firstName,lastName,email,phone,members,view,mainFood,drink,desert)
		//VALUES ('$firstName','$lastName','$email',$phone,$members,'$viewport','$mainFood','$drink','$desert')";

		$sql = "INSERT INTO booking (firstName,lastName,email,viewport,mainFood,drink,desert,phone,members,bookingDate,bookingTime) VALUES('$firstName','$lastName','$email','$viewport','$mainFood','$drink','$desert','$phone',$members,'$bookingDate','$bookingTime')";




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



	} catch (Exception $e) {
		
	}



	

	if($errorCheck == true)
	{
		$sql = "INSERT INTO MyGuests (firstname, lastname, email)
		VALUES ('John', 'Doe', 'john@example.com')";

		if ($conn->query($sql) === TRUE) {
  	echo "New record created successfully";
		} 
		else 
		{
  	echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

	}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!doctype html>
<html>
<head>
	<title>World's Best chef</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="css/Food Table-Style sheet.css">
	<link rel="stylesheet" href="css/style2.css">
	<style type="text/css">
	.php-status
	{
		color: red;
	}
	</style>
	
</head>
<body>
	<div class="wrapper">
		

		<header class="clearfix">
			<div class="logo">
				<h1 id="home-tag">World's Best Chef</h1>

                <style type="text/css">
                    
                    


                </style>


				<p><a href="login.php">Login To Dashboard - Admin</a></p>
			</div> <!-- logo -->

			<div class="socialmedia">
				<ul>
					<li><a href="#"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest fa-fw" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus fa-fw" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-rss fa-fw" aria-hidden="true"></i></a></li>
				</ul>
			</div> <!-- socialmedia -->

		</header>

		<nav>
			<ul>
				<li><a href="#home-tag">Home</a></li>
				<li><a href="#aboutUs">About Us</a></li>
				<li><a href="#menu">Menu</a></li>
				<li><a href="#bookTable">Book Table</a></li>
				<li><a href="#contactUS">Contact Us</a></li>
			</ul>
		</nav>

		<div class="slideshow-container">

<div class="mySlides fade">
  <img src="img/1.jpeg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img/2.jpeg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="img/3.jpeg" style="width:100%">

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


		<div>
			<!-- about us -->


				<div class="section">
            <div class="container">
                <div class="content-section">
                    <div class="title">
                        <h1 id="aboutUs">About Us</h1>
                    </div>
                    <div class="content">
                        <h3>World's Best Chef</h3>
                        <p>Our restaurant has been running successfully for almost 40 years. This website provides table booking service for our restaurant.  We also have 20+ recipes.  
							Below you will find information about our team members. Thank you.
						</p>
                            <div class="button">
                            	<style type="text/css">
                            	 #view {
                            	 	background-color: #8665f7;
                            		border: none;
  									color: white;
  									padding: 15px 32px;
  									text-align: center;
  									text-decoration: none;
  									display: inline-block;
  									font-size: 16px;
  									margin: 4px 2px;
  									cursor: pointer;
  									transition-duration: 0.4s;

                            	}
                            	#view:hover 
                            	{
  									background-color: #353b48; 
  									color: white;
								}
                            	</style>
                                <button id = "view" onclick="viewData();">View Team Members Data</button>
                                
                            </div>
                    </div>
                    
                </div>
                <div class="image-section">
                    <img src="image/img one.jpg">
                </div>
            </div>
            <script type="text/javascript">
            	function viewData()
            	{

            		document.getElementById("navod.1").innerHTML = "Navod Rathnayake(Leader)";
            		document.getElementById("navod.2").innerHTML = "KADSE201F-058";
            		document.getElementById("navod.3").innerHTML = "HTML,CSS,PHP,JS";
            		document.getElementById("navod.4").innerHTML = "078-68-18-808";

            		document.getElementById("nadeesha.1").innerHTML = "Nadeesha Dilshan";
            		document.getElementById("nadeesha.2").innerHTML = "KADSE201F-O23";
            		document.getElementById("nadeesha.3").innerHTML = "HTML,CSS,PHP";
            		document.getElementById("nadeesha.4").innerHTML = "071-23-08-442";

            		document.getElementById("sonali.1").innerHTML = "Sonali Jayarathne";
            		document.getElementById("sonali.2").innerHTML = "KADSE201F-052";
            		document.getElementById("sonali.3").innerHTML = "HTML,CSS,PHP";
            		document.getElementById("sonali.4").innerHTML = "071-95-29-100";

            		document.getElementById("thedani.1").innerHTML = "Thedani Disanayake";
            		document.getElementById("thedani.2").innerHTML = "KADSE201F-010";
            		document.getElementById("thedani.3").innerHTML = "HTML,CSS,JS";
            		document.getElementById("thedani.4").innerHTML = "076-49-80-776";

            		document.getElementById("udara.1").innerHTML = "Udara Wijethunga";
            		document.getElementById("udara.2").innerHTML = "KADSE201F-027";
            		document.getElementById("udara.3").innerHTML = "HTML,CSS";
            		document.getElementById("udara.4").innerHTML = "077-17-83-455";


            	}
            </script>
            <div class="team-members">
                                	<table border="0px" width="80%" style="margin-left: 90px; margin-top: 70px;">
                                	<tr>
                                		<td><span id="navod.1"></span></td>
                                		<td><span id="navod.2"></span></td>
                                		<td><span id="navod.3"></span></td>
                                		<td><span id="navod.4"></span></td>
                                	</tr>
                                	<tr>
                                		<td><span id="nadeesha.1"></span></td>
                                		<td><span id="nadeesha.2"></span></td>
                                		<td><span id="nadeesha.3"></span></td>
                                		<td><span id="nadeesha.4"></span></td>
                                	</tr>
                                	<tr>
                                		<td><span id="sonali.1"></span></td>
                                		<td><span id="sonali.2"></span></td>
                                		<td><span id="sonali.3"></span></td>
                                		<td><span id="sonali.4"></span></td>
                                	</tr>
                                	<tr>
                                		<td><span id="thedani.1"></span></td>
                                		<td><span id="thedani.2"></span></td>
                                		<td><span id="thedani.3"></span></td>
                                		<td><span id="thedani.4"></span></td>
                                	</tr>
                                	<tr>
                                		<td><span id="udara.1"></span></td>
                                		<td><span id="udara.2"></span></td>
                                		<td><span id="udara.3"></span></td>
                                		<td><span id="udara.4"></span></td>
                                	</tr>
                                </table>
                                </div>
        </div>


			<!-- about us -->
		</div> <!-- homecontent -->

		<style type="text/css">
	div .form form.form input,div .form form.form select{
	background: #eee;
	padding: 5px;
	margin-bottom: 5px;
	width: 221.25px;
	border: none;
	border-radius: 5px;
	font-family: inherit;
	font-size: 16px;
}

	div .form form.form label
{
	font-family:Lucida Console;
	margin-left: 15px;
	font-weight: bold;
}

div .form form.form span
{
	margin-left: 20px;
	color: red;
	font-weight: bold;
}

table
{
	border-radius: 5px;
}

div .form form.form .button
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



		<!-- menu -->

		<h1 id="menu" style="text-align: center; font-weight: bold; margin-top: 30px; margin-bottom: 10px;">Food Menu</h1>

		<div class="table-box">
    <div class="table-row table-head";>
        <div class="table-cell">
        <p>Burgers</p>
        </div>
        <div class="table-cell">
        <p>Snacks</p>
        </div>
        <div class="table-cell">
        <p>Beverages</p>
        </div>
 
    </div>
    <div class="table-row">
        <div class="table-cell">
        <p>Mini Cheese Burger<br>
            <img src="img/Mini Cheese Burger.jpg" alt="Image"> 
            <br>
             Rs.600.00
            </p>
        </div>
        <div class="table-cell">
            <p>Corn Tikki - Spicy fried Aloo<br>
                <img src="img/Corn Tikki - Spicy fried Aloo.jpg" alt="Image">
                <br>
                 Rs.1000.00
                </p>
        </div>
        <div class="table-cell">
            <p>Single Cup Brew<br>
                <img src="img/Single Cup Brew.jpg" alt="Image">
                <br>
                 Rs.450.00
                </p>
        </div>
    </div>
    <div class="table-row">
        <div class="table-cell">
            <p>Double Size Burger<br>
                <img src="img/double size burger.jpg" alt="Image">
                <br>
                 Rs.750.00
                </p>
        </div>
        <div class="table-cell">
            <p>Bread Besan Toast<br>
                <img src="img/Bread besan Toast.jpg" alt="Image">
                <br>
                 Rs.1450.00
                </p>
        </div>
        <div class="table-cell">
            <p>Caffe Americano<br>
                <img src="img/Caffe Americano.jpg" alt="Image">
                <br>
                 Rs.600.00
                </p>
        </div>
    </div>
    <div class="table-row">
        <div class="table-cell">
            <p>Bacon, EGG and Cheese<br>
                <img src="img/Bacon, EGG and Cheese.jpg" alt="Image">
                <br>
                 Rs.860.00
                </p>
        </div>
        <div class="table-cell">
            <p>Healthy soya nugget snacks<br>
                <img src="img/Healthy soya nuget snacks.jpg" alt="Image">
                <br>
                 Rs.1200.00
                </p>
        </div>
        <div class="table-cell">
            <p>Caramel Macchiato<br>
                <img src="img/Caramel Macchito.jpg" alt="Image">
                <br>
                 Rs.850.00
                </p>
        </div>
    </div>
    <div class="table-row">
        <div class="table-cell">
            <p>Pulled porx Burger<br>
                <img src="img/Pulled porx Burger.jpg" alt="Image">
                <br>
                 Rs.1150.00
                </p>
        </div>
        <div class="table-cell">
            <p>Tandoori Soya Chunks<br>
                <img src="img/Tandoori Soya Chunks.jpg" alt="Image">
                <br>
                 Rs.1650.00
                </p>
        </div>
        <div class="table-cell">
            <p>Standard black coffee<br>
                <img src="img/Standard black coffee.jpg" alt="Image">
                <br>
                 Rs.550.00
                </p>
        </div>
    </div>
    <div class="table-row">
        <div class="table-cell">
            <p>Fried chicken Burger<br>
                <img src="img/Fried chicken Burger.jpg" alt="Image">
                <br>
                 Rs.1250.00
                </p>
        </div>
        <div class="table-cell">
            <p>Chicken Nuggets<br>
                <img src="img/Chicken Nuggets.jpg" alt="Image">
                <br>
                 Rs.750.00
                </p> 
        </div>
        <div class="table-cell">
            <p>Mojito<br>
                <img src="img/Mojito.jpg" alt="Image">
                <br>
                 Rs.720.00
                </p>
        </div>   
    </div>

		<!-- menu -->






		<!-- form -->
		<div class="form" style="background-color: #ddd;">
			<form class="form" style="margin-top: 10px; padding-top: 10px;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
				<table border="0px" width="100%" >
					<tr>
						<td width = "42%" rowspan="13" style="background-color: #8665f7;">
							<h1 id="bookTable" style="color: #353b48">Book Your Table For Private Dinners & Happy Hours</h1>
							<br>
							<span>Book A Table</span>
						</td>
						<td width="20%"><label for="fname">First Name</label></td>
						<td><input type="text" id="fname" name="firstName" placeholder="First Name"></td>
						<td id="php-status"  width="300%"><span><?php echo "* " . $EfirstName . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="lname">Last Name</label></td>
						<td><input type="text" id="lname" name="lastName" placeholder="Last Name"></td>
						<td class="php-status"><span><?php echo "* " . $ElastName . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for = "email">E-mail</label></td>
						<td><input type="email" id="email" name="email" placeholder="sample@gmail.com"></td>
						<td class="php-status"><span><?php echo "* " . $Eemail . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="mobile">Mobile</label></td>
						<td>
							<input type="tel" id="phone" name="phone" placeholder="077-444-18-98" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" >
						</td>
						<td class="php-status"><span><?php echo "* " . $Ephone . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="date"></label></td>
						<td>
							<input type="date" id="date" name="bookingDate" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>" max="2025-12-31"></td>
						<td class="php-status"><span><?php echo "* " . $EbookingDate . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="time">Booking Time</label></td>
						<td>
							<input type="time" id="time" name="bookingTime" min="09:00" max="18:00">
						</td>
						<td class="php-status"><span><?php echo "* " . $EbookingTime . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="members">Members</label></td>
						<td><input type="number" id="members" name="members" min="1" max="7"></td>
						<td class="php-status"><span><?php echo "* " . $Emembers . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="view1" ;>Choose A View</label></td>
						<td>
							<select id="view1" name="viewport" >
								<option value="Indoor">Indoor</option>
								<option value="outdoor">outdoor</option>
								<option value="River Side">River Side</option>
							</select>
						</td>
						<td class="php-status"><span><?php echo "* " . $Eviewport . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="mainFood">Burgers</label></td>
						<td>
							<select id="mainFood" name="mainFood">
            		<option value="Mini Cheese Burger">Mini Cheese Burger</option>
            		<option value="Double Size Burger">Double Size Burger</option>
            		<option value="Bacon, EGG and Cheese">Bacon, EGG and Cheese</option>
           			<option value="Pulled porx Burger">Pulled porx Burger</option>
            		<option value="Fried chicken Burger">Fried chicken Burger</option>
            		
							</select>
						</td>
						<td class="php-status"><span><?php echo "* " . $EmainFood . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="drink">Snacks</label></td>
						<td>
							<select id="drink" name="drink"> 
            		<option value="Corn Tikki - Spicy fried Aloo">Corn Tikki - Spicy fried Aloo</option>
           		 	<option value="Bread Besan Toast">Bread Besan Toast</option>
           		 	<option value="Healthy soya nugget snacks">Healthy soya nugget snacks</option>
            		<option value="Tandoori Soya Chunks">Tandoori Soya Chunks</option>
           			<option value="Chicken Nuggets">Chicken Nuggets</option>
          		  
        </select>
						</td>
						<td class="php-status"><span><?php echo "* " . $Edrink . " " . $firstName; ?></span></td>
					</tr>
					<tr>
						<td><label for="desert">Beverages</label></td>
						<td>
							<select id="deserts" name="desert">
            		<option value="Single Cup Brew">Single Cup Brew</option>
            		<option value="Caffe Americano">Caffe Americano</option>
            		<option value="Caramel Macchiato">Caramel Macchiato</option>
            		<option value="Standard black coffee">Standard black coffee</option>
					<option value="Mojito">Standard black coffee</option>
        </select>
						</td>
						<td class="php-status"><span><?php echo "* " . $Edesert . " " . $firstName; ?></span></td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							
							<input class = "button" type="submit" value="submit">
							<input class = "button" type="reset" value="Clear">
						</td>
						<td></td>
					</tr>
				</table>
			</form>
		</div>
		<!-- form -->

		

		<!-- footer -->
		
		<iframe id="contactUS" width="1000" height="1000" src="Footer.php" frameBorder="0" />

		<!-- footer -->


		<div class="copyrights">
			<div class="left">
				Copyrights &copy; Domain Name. All Rights Reserved
			</div>
			<div class="right">
				Website by: BestJobsLK.COM
			</div>
		</div> <!-- copyrights -->
	</div> <!-- wrapper -->
</body>
</html>