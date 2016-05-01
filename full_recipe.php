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
$instructions = $row['instruct'];
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
	$total_time =$total_time - 60;
	
}


$ingre_array = explode(',',$ingredients);
$instruct_array = explode('.', $instructions);
	



?>
<html>
<head>
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style4.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="animate.css">
<link rel="stylesheet" href="classes.css">
<link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<link href="elements.css" rel="stylesheet">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>	
<style>

.strike:checked + label{
text-decoration:line-through;}

 
</style>


</head>
<body style="background-color:#00BCD4">
<div id="main" class="w3-card-12 recipe-full " style="
    
    position: absolute;
    top: 5%;
    margin-left: 10%;
    width:1000;
    height:90%;
    z-index: 0;
    ">

 <span id="backarrow" onclick="window.location.href='/finalWebsite/collection_recipe.html'"class="fa fa-arrow-left w3-text-brown" style="
    position: absolute;
    font-size: 30;
    top: 10	;
    left: 5;
    display: block;>"></span>
<p class="w3-text-brown dancing-font" style="
	font-size:30;
	text-align:center;
	margin-bottom:20;
	margin-top:0;
	"><?php echo $name ?> </p>
	
<div style="margin-bottom:40;position: absolute;top: 5;margin-left: 60;">
<span style="margin-left:20" class="roboto-font" >Created by&nbsp:&nbsp</span><span class="dancing-font w3-text-brown" style="font-size:25;"><?php echo $author ?></span>



</div>
<div  id="recipe-image" class="w3-card-12 " style="width:250;height:250; position:absolute;margin-left:25; transition:all 1s" >
	<img style="width:100%; height:100%; " src=<?php echo $image_link?>>

</div>
<div id="cookInfo" class="w3-card-4" style="transition:all 1s;width:425;height:400; position:absolute;left:325;">
	
	<div id="textCookInfo" class="roboto-font w3-text-brown" style=" margin-left:20 ;margin-top:20;font-size:18;">
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
	<p style="margin-bottom:20;">Preparation time&nbsp:&nbsp&nbsp <span class="dancing-font"><?php echo $prep_time ?></span></p>
	<p style="margin-bottom:20;">Cooking time&nbsp:&nbsp&nbsp <span class="dancing-font"><?php echo $cook_time?></span></p>
	<hr style="border:solid 1px #795548; margin-right:20;margin-bottom:10;">
	<p style="margin-bottom:20; margin-top:5; font-weight:600">Total time&nbsp:&nbsp&nbsp <span class="dancing-font"><?php echo "$hr hr and $total_time mins"?></span></p>
	<p id="cookWord" style="margin-bottom:10;text-align:center;font-size:13">A word from the cook</p>
	<div class="w3-container w3-light-grey w3-leftbar w3-border-brown" style="margin-left:-20;">
		<p><i class="dancing-font" style="font-size:25"><?php echo $tip ?></i><p>
	</div>
	
	</div>
</div>



<div>
<a id="button" class="w3-btn-floating-large w3-green" style="position:absolute; top:500; margin-left: 30;" onclick="everythingSwap()">
<i class="fa fa-bar-chart" style="position:absolute; top:15; right:18"></i></a>
</div>




<div class="w3-card-12 animated zoomInUp satisfy-font" id="instruct" style="background-color:wheat; position: absolute; width: 500; height: 550; left: 450; display:none">
	<p class=" w3-text-brown" style="text-align:center; font-size: 35">What to do? </p>
	<div id="textWrap" style="width:350;height:auto;background-color:wheat">
		<ol >
			<!--<li style="color:black;">First in a bowl take all the dry ingredients meant for the batter. Then add water and prepare the batter. the batter should not be too thick nor too thin.</li>
			
			<li style="color:black;">Then make slice the brinjals thinly and keep them in salted water for about 15-20 mins and make also thinly slice the potatoes. Then slit the green chillies without breaking them. Now the top and the base of the green chillies must be intact.</li>
			<li>Now heat oil for deep frying the pakoras. Then dip the vegetable slices one by one in the batter and slid these into the oil. Then fry in batches and drain the fried vegetable pakoras on kitchen tissue.</li>
			<li>Now sprinkle some chaat masala on the pakoras. Then serve the mix vegetable pakora piping hot and have fun during the monsoons.</li>-->
			<?php
			foreach ($instruct_array as $x) {
				# code...
				$text = "<li>$x</li>";
				echo $text;
			}
			?>
		</ol>
	</div>







</div>
<div class="w3-card-4" id="ingre" style="width: 200;height: 400;background-color: pink;position: absolute;right: -30;top: 10;transform: rotate(-10deg); display:none">
	
	<h1 style=" text-align:center; font-family: 'Roboto Condensed', sans-serif; color:#795548">Ingredients</h1>
	<ol class="dancing-font">
	<?php
	foreach ($ingre_array as $x) {
		# code...
		$text = "<li>$x</li>";
		echo "$text";
	}
		?>
	</ol>
	
	

</div>

<div><img class="animated tada" id="pin"src="pin.png" style="
    width: 50;
    position: absolute;
    top: 0;
    right: 10;display:none"></div>



<script>
function everythingSwap()
{
//document.getElementById("cookInfo").style.marginTop=300;
//document.getElementById('recipe-image').style.marginLeft=425;
//document.getElementById('ingre').style.zIndex=1;
document.getElementById('recipe-image').style.width=200;
document.getElementById('recipe-image').style.height=200;

document.getElementById('cookInfo').style.top=300;
document.getElementById('ingre').style.display="none";
document.getElementById('button').style.display="none";
document.getElementById('cookWord').style.display="none";
document.getElementById("textCookInfo").style.fontSize="16";
document.getElementById('cookInfo').style.left=20;
document.getElementById("cookInfo").style.width=350;
document.getElementById('cookInfo').style.height="auto";
document.getElementById('recipe-image').style.marginLeft=80;
document.getElementById('ingre').style.display="block";

document.getElementById('instruct').style.display="block";
document.getElementById('pin').style.display="block";

function close()
{

	console.log("close");
}

}



</script>

</body>
</html>