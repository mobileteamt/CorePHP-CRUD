<html>

<head>

	<title>Add Data</title>

</head>



<body>

<?php

//including the database connection file

include_once("classes/Operations.php");

include_once("classes/Validation.php");


//object to make the operation in database
$operation = new Operations();

//object to validate the data of the form
$validation = new Validation();



if(isset($_POST['Submit'])) {	

	$name = $operation->escape_string($_POST['name']);

	$age = $operation->escape_string($_POST['age']);

	$email = $operation->escape_string($_POST['email']);

		

	$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));

	$check_age = $validation->is_age_valid($_POST['age']);

	$check_email = $validation->is_email_valid($_POST['email']);

	

	// checking empty fields

	if($msg != null) {

		echo $msg;		

		//link to the previous page

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

	} elseif (!$check_age) {

		echo 'Please provide proper age.';

	} elseif (!$check_email) {

		echo 'Please provide proper email.';

	}	

	else { 

		// if all the fields are filled (not empty) 

			

		//insert data to database	

		$result = $operation->execute("INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");

		

		//display success message

		echo "<font color='green'>Data added successfully.";

		echo "<br/><a href='index.php'>View Result</a>";

	}

}

?>

</body>

</html>

