<?php
session_start();
include("./dbConnect.php");

$conn=connect();

if($conn->connect_error){
	echo"Something went wrong";

}else{
	echo"Connection Successful";
}
if(isset($_POST['email']) && isset($_POST['password'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql="SELECT name from tbl_student where email=? and password =?";
	if($stmt= $conn->prepare($sql)){
		$stmt->bind_param('ss',$email,$password);
		if($stmt->execute()){
			$stmt->store_result();
			$stmt->bind_result($name);

			$stmt->fetch();
			$_SESSION['name']=$name;
			$nam=$name;
			$stmt->close();
			$conn->close();
		}else{
			echo "Something went Wrong";
		}
	}else{
		echo"Error in query";
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>Hello <?=$name;?>
	<a href="checksession.php">CLICK HERE TO SEE SESSION SET</a>
</h1>
<a href="stddetails.php"><button>Add</button></a>
<a href="logout.php"><button type="submit">LogOut</button></a>
<table>
	<thead>
	<th>ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Class</th>
	<th>Action</th>
	</thead>
	<tbody>
	<?php
			$sql = "SELECT id, name,class,email from tbl_student_info";
			$i = 0;
	if($stmt = $conn->prepare($sql)){
		if($stmt->execute()){
			$stmt->store_result();
			$stmt->bind_result($id,$name,$class,$email);
			while($stmt->fetch()){
				$i++;
				?>
				<td><?=$i?></td>
				<td><?=$name?></td>
				<td><?=$class?></td>
				<td><?=$email?></td>
				<td><a href="edit.php?id=<?=$id?>">EDIT</a>/DELETE</td>	
				
		<tr>
		</tr>

		<?php
					}
		}
	}


	?>

	</tbody>
</table>
</body>
</html>