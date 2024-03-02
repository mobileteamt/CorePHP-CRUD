<?php

//including the database connection file

include_once("classes/Operations.php");



$operation = new Operations();



//fetching data in descending order (lastest entry first)

$query = "SELECT * FROM users ORDER BY id DESC";

$result = $operation->getData($query);

//echo '<pre>'; print_r($result); exit;

?>



<html>

<head>	

	<title>Homepage</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>



<body>

<a href="insert.html" class="btn btn-primary">Add New Data</a><br/><br/>



	<table width='80%' border=0 class="table table-bordered">



	<tr bgcolor='#CCCCCC'>

		<td>Name</td>

		<td>Age</td>

		<td>Email</td>

		<td>Update</td>

	</tr>

	<?php 
	if(!empty($result)){
		foreach ($result as $key => $res) {

			//while($res = mysqli_fetch_array($result)) { 		
		
				echo "<tr>";
		
				echo "<td>".$res['name']."</td>";
		
				echo "<td>".$res['age']."</td>";
		
				echo "<td>".$res['email']."</td>";	
		
				echo "<td><a href=\"update.php?id=$res[id]\">Edit</a> | <a href=\"remove.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
				
				echo "</tr>";		
		
			}
	}else{
		
			echo "<tr>";

			echo "<td colspan='4' class='text-center'>No Record Found</td>";

			echo "</tr>";
	}

	?>

	</table>

</body>

</html>

