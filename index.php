<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<title></title>


	<!--Load Random Stylesheet from css directory -->
	<?php
		$dir = 'css/*';
		$styles = array();
		foreach(glob($dir) as $file){
			if(!is_dir($file)){
				array_push($styles, $file);
				
			}
		}
		$rand =  rand(0, count($styles) - 1);
		
		echo '<link rel="stylesheet" type="text/css" href="' . $styles[$rand] . '">';

	?>


</head>
<body>

	<h1 id="davon"></h1>


<script type="text/javascript">
	var tweets = [];
	//Snag last 30 the tweets from @shitdavonsays
	$.getJSON('tweets_json.php?count=30&screen_name=shitdavonsays', function(data){
		var dataNum = data.length;
		$.each(data, function(index, value){
			tweets.push(value.text);
			if (tweets.length === dataNum) {
				//channel Davon's mind after all the data has loaded
				newQuote();
			}
		});

	});	
	//Gimmie a random tweet
	var newQuote = function(){
		console.log("running");
		var rand = Math.floor(Math.random() * tweets.length - 1);
		$("#davon").text(tweets[rand]);
	}
	
	
</script>
</body>
</html>