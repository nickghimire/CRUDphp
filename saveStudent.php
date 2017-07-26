<?php
	include("dbConnect.php");
	if(isset($_POST['email']) && isset($_POST['name'])){

		$sql = "UPDATE tbl_student_info set name=?, class=?, email=? where id=?";

		$conn = connect();

		if($stmt = $conn->prepare($sql)){
			$stmt->bind_param('sssi',$_POST['name'],$_POST['class'],$_POST['email'],$_POST['id']);
			if($stmt->execute()){
				echo "<script>alert('successfull')
						window.location.href='welcome.php';
				</script>
				";
			}	
		}
	}
?>