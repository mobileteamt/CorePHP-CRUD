<?php
//including the database connection file
include_once("classes/Operations.php");
//object to make the operation in database
$operation = new Operations();

//getting id of the data from url
$id = $operation->escape_string($_GET['id']);

//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $operation->delete($id, 'users');

if ($result) {
	//redirecting to the display page (index.php in our case)
	header("Location:index.php");
}
?>

