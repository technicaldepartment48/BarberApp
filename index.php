<?php

session_start();


if(isset($_POST["amount"])){



	if( empty($_POST["day"]) || empty($_POST["week"]) || empty($_POST["year"])){


	
		echo "<p color='red'>You did not fill in all fields!</p>";

	exit();
	
	
	}else{

	$_SESSION["amount"]  = $_POST["amount"];
	$_SESSION["day"]  = $_POST["day"];
	$_SESSION["week"]  = $_POST["week"];
	$_SESSION["year"]  = $_POST["year"];

	echo $_SESSION["amount"].'<br/>'.$_SESSION["day"].'<br/>'.$_SESSION["week"].'<br/>'.$_SESSION["year"];

	exit();

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

<h2>FORM</h2>

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



