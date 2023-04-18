<?php

session_start();


if(isset($_POST["amount"])){



	if( empty($_POST["day"]) || empty($_POST["week"]) || empty($_POST["year"]) || empty($_POST["year"])){


	
		echo '<p style="color:red">You did not fill in all fields!</p>';

	exit();
	
	
	}else{

	$_SESSION["amount"]  = $_POST["amount"];
	$_SESSION["day"]  = $_POST["day"];
	$_SESSION["week"]  = $_POST["week"];
	$_SESSION["month"]  = $_POST["month"];
	$_SESSION["year"]  = $_POST["year"];

	$amount = $_SESSION["amount"];
	$day = $_SESSION["day"];
	$week = $_SESSION["week"];
	$month = $_SESSION["month"];
	$year = $_SESSION["year"];

	echo "<h4>RECORD SAVED</h4>";

	echo $_SESSION["amount"].'<br/>'.$_SESSION["day"].'<br/>'.$_SESSION["week"].'<br/>'.$_SESSION["month"].'<br/>'.$_SESSION["year"];



	//Connect to database
	$host = "localhost"; 
	$dbname = "sales_db";
	$username = "root";
	$password = "";


	$conn = mysqli_connect(hostname: $host,
							username: $username,
							password: $password,
							database: $dbname);


	if(mysqli_connect_errno()){

		die("Connection error: " . mysqli_connect_errno());

	}	
	
	echo "<br/><br/><br/>Database Connection successful.";

	$sql = "INSERT INTO sales(amount, dayt, week, montht, yeart )
	     	VALUES (?, ?, ?, ?, ?)";


	$stmt = mysqli_stmt_init($conn);

	if(mysqli_stmt_prepare($stmt, $sql)){
		die(mysqli_error($conn));
	}

	mysqli_stmt_bind_param($stmt, "isisi",
							$amount,
							$day,
							$week,
							$month,
							$year); 

	mysqli_stmt_execute($stmt);
	
	echo "Record Saved";

	

	}


}

?>



<html lang="en">
<head>

	<meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=1"/>

<style type="text/css">


</style>


</head>

<body>



<div id="container">

<h2>SALES FORM</h2>

<div>


<form method="post" enctype="multipart/form-data">

                    <span class="u">Amount:</span>
					<input type="text" name="amount"/>
                    
                    <span class="p">Day:</span>
					<select name="day">
						<option>Monday</option>
						<option>Tuesday</option>
						<option>Wednesday</option>
						<option>Thursday</option>
						<option>Friday</option>
						<option>Saturday</option>
						<option>Sunday</option>
					</select>

					<span class="u">Week:</span>
					<input type="text" name="week"/>

					<span class="p">Month:</span>
					<select name="month">
						<option>January</option>
						<option>February</option>
						<option>March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>August</option>
						<option>September</option>
						<option>October</option>
						<option>November</option>
						<option>December</option>
					</select>

					<span class="u">Year:</span>
					<input type="text" name="year"/>

					<input type="submit" value="submit" >

</form>







</div>




</div>



</body>


</html>



