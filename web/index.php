<?php
header('HTTP/1.0 503 Service Unavailable');
?>

<!DOCTYPE html>
	<html>
	  <head>
		<meta charset="utf-8">
		<title>No such app | Heroku</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://www.herokucdn.com/favicon.ico">
		<style media="screen">
		  html,body,iframe {
			margin: 0;
			padding: 0;
		  }
		  html,body {
			height: 100%;
			overflow: hidden;
		  }
		  iframe {
			width: 100%;
			height: 100%;
			border: 1;
		  }
		</style>
	  </head>
	  <body>
		<iframe src="//www.herokucdn.com/error-pages/no-such-app.html"></iframe>
	  </body>
	</html>
