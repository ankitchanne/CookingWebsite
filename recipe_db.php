<?php

$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if ($check==false)
{
	$uploadOk = 0;
}

if (file_exists($target_file))
{
	$uploadOk = 0;

}

if($uploadOk == 0){
	echo "File not uploaded";}
	
	
else
{
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
	{
		echo $_FILES["fileToUpload"]["name"]." has been uploaded.";
	}
}

$conn_db = mysqli_connect("localhost","root","","full_recipe");
if(!$conn_db)
{
	die("no db");
}
$name= $_POST['name'];
$author = $_POST['author'];
$ingre = $_POST['ingre'];
$servings = $_POST['servings'];
$prep_time = $_POST['prep_time'];
$cook_time = $_POST['cook_time'];
$tip = $_POST['tip'];
$instruct = $_POST['instruct'];

$image_link = $target_file;

$query = "INSERT INTO `recipe_details` (`recipe_name`, `created_by`, `ingredients`, `instruct`, `servings`, `prep_time`, `cook_time`, `tip`, `image`) VALUES ('$name', '$author', '$ingre', '$instruct', '$servings', '$prep_time', '$cook_time', '$tip', '$image_link');";	

echo $query;

$result = mysqli_query($conn_db,$query);







?>