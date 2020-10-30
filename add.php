<?php
	require 'config.php';
	if ($_POST) {
		$title=$_POST['title'];
		$desc=$_POST['description'];

		$sql="INSERT INTO todo(title,description) VALUES(:title,:description)";
		$pdostatement=$pdo->prepare($sql);
		$result=$pdostatement->execute(
			array(
				':title'=>$title,
				':description'=>$desc
			)
		);
		if($result){
			echo "<script>alert('New Todo is added');window.location.href='index.php';</script>";
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Create New Todo</h2>
			<form action="add.php" method="post">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				
				<div class="form-group">
					<label>Description</label>
					<textarea name="description" rows="8" cols="60" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Submit">
					<a href="index.php" class="btn btn-default">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>