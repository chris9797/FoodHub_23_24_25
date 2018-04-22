<html>
	<head>
		<title>FoodHub</title>
		<link rel="stylesheet" href="style.css">
		<style>
			p.about {
 		    margin-left: auto;
      		margin-right: auto;
    	    width: 30em

			}
			#result {
    width: 1141px;
    padding: 10px;
    border: 5px solid gray;
    margin: 0;
}


		</style>
		<script src="jquery.js"></script>
		<script src="boots.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="home"><img src="about.jpeg" height="52" /></a>
			</div>
			<div id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="home">Home</a></li>
					<li><a href="about">About</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center">FoodHub</h2><br />
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search Restaurant" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>
