<?php require_once("../../CommonFunctions.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <?php stylesheet(); ?>
</head>
<body>
    <?php
        generateHeader();
        renderCharacterInfo(json_decode(file_get_contents("character.json"), true));
    ?>
</body>
</html>