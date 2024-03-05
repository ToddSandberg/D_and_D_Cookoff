<?php require_once("../../../CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<?php stylesheet(); ?>
</head>
<body>
	<?php
		appbar();
		generateHeader();
	?>
    <p>A small backalley store owned by <?php echo createLink("Characters/", "Nell Armstrong"); ?></p>
</body>
</html>