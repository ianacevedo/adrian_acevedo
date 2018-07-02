<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php

if(isset($_POST['submit'])){
	include "class/aacevedo.php";
	
	$class = new Aacevedo();
	$result = $class->addData();
	header("location:index.php");
}
?>	
<div class="container">
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	
	  <div class="form-group">
		<label for="first_name">First Name:</label>
		<input type="text" class="form-control" name="first_name">
	  </div>
	  <div class="form-group">
		<label for="last_name">Last Name:</label>
		<input type="text" class="form-control" name="last_name">
	  </div>
	  <div class="form-group">
		<label> Contact Number</label><input type="text" class="form-control" name="contact_number">
	  </div>
	  <button type="submit" name="submit" class="btn btn-default">Submit</button>
	</form>
	
	</form>
</div>
</body>
</script>
</html>
