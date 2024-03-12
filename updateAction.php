<?php
// including the database connection file
include_once("classes/Operations.php");
include_once("classes/Validation.php");

$operation = new Operations();
$validation = new Validation();

if(isset($_POST['update']))
{	
	$id = $operation->escape_string($_POST['id']);
	
	$name = $operation->escape_string($_POST['name']);
	$age = $operation->escape_string($_POST['age']);
	$email = $operation->escape_string($_POST['email']);
	
	$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
	$check_age = $validation->is_age_valid($_POST['age']);
	$check_email = $validation->is_email_valid($_POST['email']);
	
	// checking empty fields
	if($msg) {
		echo $msg;		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} elseif (!$check_age) {
		echo 'Please provide proper age.';
	} elseif (!$check_email) {
		echo 'Please provide proper email.';	
	} else {	
		//updating the table
		$result = $operation->execute("UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
