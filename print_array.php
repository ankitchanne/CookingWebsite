<?php
$conn_db = mysqli_connect("localhost","root","","full_recipe");

if(!$conn_db)
{
	die("Failed to connect to db");
}

$query = "SELECT * FROM `recipe_details`";
$result = mysqli_query($conn_db,$query);
echo "[";
while ($row = mysqli_fetch_assoc($result))
{

echo "[\"".$row["recipe_name"]."\",\"".$row["image"]."\",\"".$row["recipe_name"]."\"],";

}
echo "[]]";
?>