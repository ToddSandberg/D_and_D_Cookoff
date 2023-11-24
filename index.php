<?php require_once("CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
<?php stylesheet(); ?>
<!-- TODO make ajax request with pure javascript? -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<?php appbar(); ?>
	<div class="appContent">
		<?php generateHeader("Home"); ?>
		<form action="/d_and_d_cookoff/search.php" method="get">
			<input type="text" name="file">
			<button type="submit">Search</button>
		</form></br>
		<?php
			displayDirectory();
			echo createNewFileButton();
		?>
	</div>
</body>
</html>