<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<title>Davon once said:</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" href="global.css">

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
	<div id="icons">
		<!-- <i class="fa fa-download" aria-hidden="true"></i> -->
		<a href="https://github.com/gravdanger510/shitDavonSays" target="_blank">
			<i class="fa fa-info-circle" aria-hidden="true"></i>
		</a>
	<!-- 	<i class="fa fa-upload" aria-hidden="true"></i> -->
	</div>


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
	},
	downloadScreenshot = function(){
		// var confirm = window.confirm("Download this Quote?");
		var confirm = true;
		if(confirm){
			html2canvas(document.body, {
			  onrendered: function(canvas) {
			    var img = canvas.toDataURL("image/png");
					document.write('<img src="'+img+'"/>');
			  }
			})
		}
	}


</script>
</body>
</html>
