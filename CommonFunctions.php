<?php

function displayDirectory() {
    $dirs = array_filter(glob('*'), 'is_dir');
    foreach($dirs as $value){
        echo "<a href=".rawurlencode($value).">".$value."</a></br>";
    }
}

function createLink($path, $name) {
    echo "<a href='/d_and_d_cookoff/".$path.$name."'>".$name."</a>";
}

function generateHeader($pageNameOverride = null) {
    if ($pageNameOverride != null) {
        echo "<h1><a href='/d_and_d_cookoff'>D&D Cookoff</a></h1><h3>".$pageNameOverride."</h3>";
    } else {
        echo "<h1><a href='/d_and_d_cookoff'>D&D Cookoff</a></h1><h3>".basename(getcwd())."</h3>";
    }
}

function createNewFileButton() {
    $newPage = str_replace("\\", "/" , getcwd()."/NewPage");
    return "<script type='text/javascript' src='CommonFunctions.js'></script>
    <button onclick='callPHPUtilityFunction(\"createNewPage\", \"$newPage\")'>Add New Page</button>";
}

function getBasePageHTML() {
    // TODO get relative path for CommonFunctions.php
    return
    '<?php require_once("../CommonFunctions.php"); ?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <?php
        generateHeader();
        displayDirectory();
    ?>
    </body>
    </html>';
}

?>