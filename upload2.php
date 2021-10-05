<?php
	require 'conn.php';
	
	if(ISSET($_POST['upload'])){
		if($_FILES['file']['name']){
			$filename = explode(".", $_FILES['file']['name']);
			$ext=end($filename);
			
			if($ext=="csv"){
				$handler=fopen($_FILES['file']['tmp_name'], "r");
				while($data=fgetcsv($handler)){
					mysqli_query($conn, "INSERT INTO `faculty_list` VALUES('', '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]')") or die(mysqli_error());
				}
				
				header('location: index.php');
			}else{
				echo"<script>alert('Only csv file is allowed to be upload!')</script>";
				echo"<script>window.location='index.php'</script>";
			}	
		}
	}
?>