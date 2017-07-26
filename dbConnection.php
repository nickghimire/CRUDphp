<?php
include("./dbConnect.php");
$conn = connect();

$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$password=$_POST['password'];

if(isset($name) && isset($email) && isset($address) && isset($password)){
	if(!empty($name && $email && $address && $password)){
		$sql="INSERT INTO tbl_student(name,email,address,password) VALUES(?,?,?,?)";
		if($stmt = $conn-> prepare($sql)){
			$stmt->bind_param('ssss',$name,$email,$address,$password);
			if($stmt->execute()){
				header("Location: index.php");
			}else{
				echo"query execution failed";
			}
		}else{
			echo"There was something wrong with the query.";
		}
	}
}
?>