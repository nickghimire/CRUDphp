<?php
	include("dbConnect.php");
	if(isset($_POST['email']) && isset($_POST['name'])){

		$sql = "INSERT into tbl_student_info (name, class, email) VALUES (?,?,?)";

		$conn = connect();

		if($stmt = $conn->prepare($sql)){
			$stmt->bind_param('sss',$_POST['name'],$_POST['class'],$_POST['email']);
			if($stmt->execute()){
				echo "<script>alert('successfull')
						window.location.href='welcome.php';
				</script>
				";
			}	
		}
	}
?>