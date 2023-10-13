<?php require_once("CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- TODO make ajax request with pure javascript? -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<?php generateHeader("Home"); ?>
	<form action="/d_and_d_cookoff/search.php" method="get">
		<input type="text" name="file">
		<input type="submit" value="Search">
	</form></br>
	<?php
		displayDirectory();
		echo createNewFileButton();
	?>
</body>
</html>