<?php
error_reporting(0);
?>
<?php
$msg = "";


if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "image/".$filename;
		
	$db = mysqli_connect("localhost", "root", "", "photos");

		
		$sql = "INSERT INTO image (filename) VALUES ('$filename')";

	
		mysqli_query($db, $sql);
		
		
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
$result = mysqli_query($db, "SELECT * FROM image");
?>
