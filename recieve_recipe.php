<?php

$name = $_GET['name'];
$conn_db = mysqli_connect("localhost","root","","full_recipe");

if(!$conn_db){
	die("Failed to connect");

}

$query = "SELECT * FROM `recipe_details` where recipe_name = '$name'";


$result = mysqli_query($conn_db,$query);



$row = mysqli_fetch_assoc($result);
$recipe_name = $row['recipe_name'];
$author = $row['created_by'];
$ingredients = $row['ingredients'];
$servings = $row['servings'];
$prep_time = $row['prep_time'];
$cook_time = $row['cook_time'];
$tip = $row['tip'];
$image_link = $row['image'];

$total_time = $prep_time+$cook_time;
$hr = 0;

while ($total_time>=60)
{
	$hr =$hr +1;
	$total =$total - 60;
	
}


$ingre_array = explode(',',$ingredients);
	



?>
<html>
<head>
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style4.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="classes.css">
<link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link href="elements.css" rel="stylesheet">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">	
<style>

.strike:checked + label{
text-decoration:line-through;}


</style>


</head>
<body style="background-color:#00BCD4">
<div id="main" class="w3-card-12 recipe-full">
<p class="w3-text-brown dancing-font" style="
	font-size:30;
	text-align:center;
	margin-bottom:20;
	"><?php echo $name ?> </p>
<div style="margin-bottom:40">
<span style="margin-left:20" class="roboto-font" >Created by&nbsp:&nbsp</span><span class="dancing-font w3-text-brown" style="font-size:25;"><?php echo $author?></span>



</div>
<div  id="recipe-image" class="w3-card-12" style="width:250;height:250; position:absolute;margin-left:25; transition:margin-left 0.7s" >
	<img style="width:100%; height:100%; " src="<?php echo $image_link ?>">

</div>
<div id="cookInfo" class="w3-card-4" style="transition:margin-top 0.5s;width:425;height:400; position:absolute;left:325;">
	
	<div class="roboto-font w3-text-brown" style=" margin-left:20 ;margin-top:20;font-size:18;">
	<p style="margin-bottom:20;"><span>Rating&nbsp:&nbsp&nbsp</span>
	<div class="stars" style="position: absolute;top: 20;left: 0;">
  <form action="">
    <input class="star star-5" id="star-5" type="radio" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3"  id="star-3" type="radio" name="star"/>
    <label class="star star-3 " for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star"/>
    <label class="star star-1" for="star-1"></label>
  </form>
</div>
	<p style="margin-bottom:20;">Servings&nbsp:&nbsp&nbsp <span class="dancing-font"><?php echo $servings ?></span></p>
	<p style="margin-bottom:20;">Preparation time&nbsp:&nbsp&nbsp <span class="dancing-font"><?php echo $prep_time?> min</span></p>
	<p style="margin-bottom:20;">Cooking time&nbsp:&nbsp&nbsp <span class="dancing-font"><?php echo $cook_time?> min</span></p>
	<hr style="border:solid 1px brown; margin-right:20;margin-bottom:10;">
	<p style="margin-bottom:20; margin-top:5; font-weight:600">Total time&nbsp:&nbsp&nbsp <span class="dancing-font"><?php echo "$hr hr and $total_time mins"?></span></p>
	<p style="margin-bottom:10;text-align:center;font-size:13">A word from the cook</p>
	<div class="w3-container w3-light-grey w3-leftbar w3-border-brown">
		<p><i class="dancing-font" style="font-size:25">"<?php echo $tip?>"</i><p>
	</div>
	
	</div>
</div>



<div>
<a class="w3-btn-floating-large w3-green" style="position:absolute; top:500; margin-left: 30;" onclick="everythingSwap()">
<i class="fa fa-bar-chart" style="position:absolute; top:15; right:18"></i></a>
<div class="w3-card-12 w3-container w3-white" id="ingre" style="
	height: auto;
    width: auto;
    left: 0;
    position: absolute;
    margin-left: 25;
    transition:z-index 2s;
    z-index:-1;">
<h1 style=" text-align:center; font-family: 'Roboto Condensed', sans-serif; color:#795548">Ingredients</h1>
<hr>
<!--<input style="margin-bottom:20" class="w3-check strike dancing-font" type="checkbox">
<label class="dancing-font">Milk</label><br>
<input style="margin-bottom:20" class="w3-check strike dancing-font" type="checkbox">
<label class="dancing-font">Sugar</label><br>
<input style="margin-bottom:20" class="w3-check strike dancing-font" type="checkbox">
<label  class="dancing-font">Bournvita</label><br>-->

<?php
foreach ($ingre_array as $x)
{
$text = "<input style='margin-bottom:20' class='w3-check strike dancing-font' type='checkbox'>
<label class='dancing-font'>$x</label><br>";
echo $text;
}

?>

</div>
</div>





<script>
function everythingSwap()
{
document.getElementById("cookInfo").style.marginTop=300;
document.getElementById('recipe-image').style.marginLeft=425;
document.getElementById('ingre').style.zIndex=1;

}



</script>

</body>
</html>