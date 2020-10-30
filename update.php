<?php
	require 'config.php';
	if($_POST){
		/*echo 'post action';*/
		$title=$_POST['title'];
		$desc=$_POST['description'];
		$id=$_POST['id'];

		$pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id' ");
		$result= $pdostatement->execute();
		if($result){
			echo "<script>alert('New Todo is updated');window.location.href='index.php';</script>";
		}
	}else{
		$pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
		$pdostatement ->execute();
		$result = $pdostatement->fetchAll();

		/*print "<pre>";
		print_r($result[0]);*/
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
			<h2>Edit New Todo</h2>
			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control" required="required" value="<?php echo  $result[0]['title']?>">
				</div>
				
				<div class="form-group">
					<label>Description</label>
					<textarea name="description" rows="8" cols="60" class="form-control" required="required"><?php echo  $result[0]['description']?>
					</textarea>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Update">
					<a href="index.php" class="btn btn-default">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>