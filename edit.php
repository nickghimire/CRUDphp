<?php include("dbConnect.php");
	$conn = connect();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="saveStudent.php" method="post">

<?php
	$sql = "SELECT id, name,class,email from tbl_student_info where id = $_GET[id]";
			$i = 0;
	if($stmt = $conn->prepare($sql)){
		if($stmt->execute()){
			$stmt->store_result();
			$stmt->bind_result($id,$name,$class,$email);
			while($stmt->fetch()){

?>
	<div class="form-group">
	<label for="name">Name:</label>
	<input type="hidden" id="id" name="id" value=<?=$id?>>
	<input type="name" class="form-control" name="name" value="<?=$name?>" required>

	<div class="form-group">
	<label for="usn">class:</label>
	<input type="usn" class="form-control" name="class" value="<?=$class?>" required>

	<div class="form-group">
	<label for="email">email:</label>
	<input type="email" class="form-control" name="email" value="<?=$email?>" required>
	<input type="submit">
	<?php
		}
	}
}
	?>
</form>
</body>
</html>