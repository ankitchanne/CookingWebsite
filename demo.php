<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/classes.css">
<link rel="stylesheet" href="css/cards.css">
<link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>demo</title>
	<link rel="stylesheet" type="text/css" href="css/load.css">
	<script type="text/javascript">
	document.onreadystatechange = function () {
 	var state = document.readyState
  	if (state == 'interactive') {
       document.getElementById('main').style.visibility="hidden";
 		 } 

 		else if (state == 'complete') {
     	 setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('loading').style.visibility="hidden";
         document.getElementById('main').style.visibility="visible";
      },1000);
  }
}
	</script>
	
</head>
<body class="w3-brown" style="width:100%; height:100%">
	<div id="loading"></div>
	<div class="w3-card-12 w3-white" id="main">
		<div class="w3-card-12 merienda-font" style="margin-left:35;width: 20%;margin-top:40;margin-right:20; font-weight:600;color:#795548; display:inline-block">
	<img src="images/rec1.jpg" width="100%">
	<div class="w3-container w3-center" style="font-size:18">
	<p >Mixed Veg pokoda </p>
	</div>
	</div>
		
	</div>
</body>
</html>