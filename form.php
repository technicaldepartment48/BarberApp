<?php

session_start();


if(isset($_POST["amount"])){



	if( empty($_POST["day"]) || empty($_POST["date"]) || empty($_POST["week"]) || empty($_POST["month"]) || empty($_POST["year"])){


	
		echo '<p style="color:red">You did not fill in all fields!</p>';

	exit();
	
	
	}else{

	$_SESSION["amount"]  = $_POST["amount"];
	$_SESSION["day"]  = $_POST["day"];
	$_SESSION["date"]  = $_POST["date"];
	$_SESSION["week"]  = $_POST["week"];
	$_SESSION["month"]  = $_POST["month"];
	$_SESSION["year"]  = $_POST["year"];

	$amount = $_SESSION["amount"];
	$day = $_SESSION["day"];
	$date = $_SESSION["date"];
	$week = $_SESSION["week"];
	$month = $_SESSION["month"];
	$year = $_SESSION["year"];

	echo "<h4>RECORD SAVED</h4>";

	echo $_SESSION["amount"].'<br/>'.$_SESSION["day"].'<br/>'.$_SESSION["day"].'<br/>'.$_SESSION["week"].'<br/>'.$_SESSION["month"].'<br/>'.$_SESSION["year"];



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

	$sql = "INSERT INTO sales(amount, day_col, date_col, week, month_col, year_col )
	     	VALUES (?, ?, ?, ?, ?)";


	$stmt = mysqli_stmt_init($conn);

	if(mysqli_stmt_prepare($stmt, $sql)){
		die(mysqli_error($conn));
	}

	mysqli_stmt_bind_param($stmt, "isiisi",
							$amount,
							$day,
			       				$date,
							$week,
							$month,
							$year); 

	mysqli_stmt_execute($stmt);
	
	echo "Record Saved";

	

	}


}

?>


