<?php

function displayDirectory() {
    $dirs = array_filter(glob('*'), 'is_dir');
    echo "<div class='directory'>";
    echo "<p>Subfolders</p>";
    echo "<ul>";
    foreach($dirs as $value){
        echo "<li><a href=".rawurlencode($value).">".$value."</a></li>";
    }
    echo "</ul>";
    echo "</div>";
}

function createLink($path, $name) {
    return "<a href='/d_and_d_cookoff/".$path.$name."'>".$name."</a>";
}

function stylesheet() {
    $path = str_replace("\\", "/" , getcwd());
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    echo "<link rel='stylesheet' href='".getRelativePath($path)."index.css'>";
}

function generateHeader($pageNameOverride = null) {
    if ($pageNameOverride != null) {
        echo "<h1><a href='/d_and_d_cookoff'>D&D Cookoff</a></h1><h3>".$pageNameOverride."</h3>";
    } else {
        echo "<h1><a href='/d_and_d_cookoff'>D&D Cookoff</a></h1><h3>".basename(getcwd())."</h3>";
    }
}

function renderCharacterInfo($charJson) {
    $charHtml = "";

    // Locations
    $charHtml .= "<p><b>Locations:</b> ";
    foreach($charJson["locations"] as $location) {
        $charHtml .= createLink($location["linkPath"], $location["name"]);
    }
    $charHtml .= "</p>";

    foreach($charJson["descriptionLines"] as $descriptionLine) {
        $charHtml .= "<p>".$descriptionLine."</p>";
    }

    echo $charHtml;
}

function renderMonsterInfo($monsterJson) {
    $charHtml = "";

    $charHtml .= "<p><b>AC:</b> ".$monsterJson["AC"]."</p>";
    $charHtml .= "<p><b>HP:</b> ".$monsterJson["HP"]."</p>";
    $charHtml .= "<p><b>Speed:</b> ".$monsterJson["Speed"]."</p>";
    $charHtml .= "<p><b>STR:</b> ".$monsterJson["STR"]."</p>";
    $charHtml .= "<p><b>DEX:</b> ".$monsterJson["DEX"]."</p>";
    $charHtml .= "<p><b>CON:</b> ".$monsterJson["CON"]."</p>";
    $charHtml .= "<p><b>INT:</b> ".$monsterJson["INT"]."</p>";
    $charHtml .= "<p><b>WIS:</b> ".$monsterJson["WIS"]."</p>";
    $charHtml .= "<p><b>CHA:</b> ".$monsterJson["CHA"]."</p>";

    echo $charHtml;
}

function createNewFileButton() {
    $path = str_replace("\\", "/" , getcwd());
    $newPage = $path."/NewPage";
    $relativePath = getRelativePath($path);
    return "<script type='text/javascript' src='".$relativePath."CommonFunctions.js'></script>
    <input type='text' id='newPageName' />
    <button onclick='callPHPUtilityFunction(\"createNewPage\", fetchNewPagePath(\"$path\"), \"$relativePath\")'>Add New Page</button>";
}

function getRelativePath($absolutePath) {
    $splitPath = explode('/', $absolutePath);
    $relativePath = "";
    // TODO this is magic number to get relative path from absolute path on my system :/
    for ($i = 0; $i < (count($splitPath) - 4); $i++) {
        $relativePath .= "../";
    }
    return $relativePath;
}

function getBasePageHTML($relativePath) {
    return
    '<?php require_once("'.$relativePath.'CommonFunctions.php"); ?>
    <!DOCTYPE html>
    <html>
    <head>
    <?php stylesheet(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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