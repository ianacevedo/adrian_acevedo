<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
	include "class/aacevedo.php";
	
	$class = new Aacevedo();
	$result = $class->getAll();
	
?>	
<div class="container">
	<table class="table">
	<tr>
		<th><a href="add_person.php" class="btn btn-primary">Add</a></th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Contact Number</th>
		<th>Action</th>
	</tr>
	<tbody>
	<?php foreach($result as $res):?>
	<tr>
		<td><?=$res->id?></td>
		<td><?=$res->first_name?></td>
		<td><?=$res->last_name?></td>
		<td><?=$res->contact_number?></td>
		<td><a href="deldata.php?id=<?=$res->id?>" class="btn btn-danger">Delete</a> <a href="edit_data.php?id=<?=$res->id?>" class="btn btn-success">Edit</a></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
</body>
</script>
</html>
