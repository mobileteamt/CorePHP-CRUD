<?php
// including the database connection file

include_once("classes/Operations.php");

//object to make the operation in database
$operation = new Operations();



//getting id from url

$id = $operation->escape_string($_GET['id']);



//selecting data associated with this particular id

$result = $operation->getData("SELECT * FROM users WHERE id=$id");



foreach ($result as $res) {

	$name = $res['name'];

	$age = $res['age'];

	$email = $res['email'];

}

?>

<html>

<head>	

	<title>Edit Data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>



<body>

	<a href="index.php" class="btn btn-primary">Home</a>

	<br/><br/>

	

	<form name="form1" method="post" action="updateAction.php">

		<table border="0" class="table table-responsive table-bordered">

			<tr> 

				<td>Name</td>

				<td><input type="text" placeholder="Please enter the Name" name="name" value="<?php echo $name;?>" class="form-control"></td>

			</tr>

			<tr> 

				<td>Age</td>

				<td><input type="text" placeholder="Please enter the Age" name="age" value="<?php echo $age;?>" class="form-control"></td>

			</tr>

			<tr> 

				<td>Email</td>

				<td><input type="text" placeholder="Please enter the Email" name="email" value="<?php echo $email;?>" class="form-control"></td>

			</tr>

			<tr>

				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>

				<td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>

			</tr>

		</table>

	</form>

</body>

</html>

