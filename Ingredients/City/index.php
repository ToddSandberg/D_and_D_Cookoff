<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h1><a href="/d_and_d_cookoff">D&D Cookoff</a></h1><br/>
	<?php
		$dirs = array_filter(glob('*'), 'is_dir');
		foreach($dirs as $value){
			echo "<a href=".$value.">".$value."</a></br>";
		}
	?>
</body>
</html>