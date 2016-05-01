$(document).ready(function(){
	$("img").click(function(){
		
		$("#load_recipe").show();
		$("#load_recipe").load("full_recipe.html");
	})


	$('#backarrow').click(function(){
		console.log("backarrow clicked")
		$("#load_recipe").hide();
	})
})