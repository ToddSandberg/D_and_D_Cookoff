<?php require_once("../CommonFunctions.php"); ?>
    <!DOCTYPE html>
    <html>
    <head>
    <?php stylesheet(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <?php appbar(); ?>
        <div class="appContent">
            <?php
                generateHeader();
            ?>
            <br/>
            Books containing predefined recipes.
            <?php
                displayDirectory();
                echo createNewFileButton();
            ?>
        </div>
    </body>
    </html>