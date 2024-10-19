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

// TODO use generic function for everything
/*function renderCharacterInfo($charJson) {
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

function renderIngredientInfo($ingJson) {
    $charHtml = "";

    $charHtml .= "<h5>".$ingJson["Name"]."</h5>";
    $charHtml .= "<p><b>Cookbook Level:</b> ".$ingJson["Level"]."</p>";
    $charHtml .= "<p><b>Preparation:</b> ".$ingJson["Preparation"]."</p>";
    $charHtml .= "<p><b>Taste:</b> ".$ingJson["Taste"]."</p>";

    // Locations
    $charHtml .= "<p><b>Sources:</b> ";
    if (array_key_exists("Sources", $ingJson) && $ingJson["Sources"] != null) {
        foreach($ingJson["Sources"] as $source) {
            $charHtml .= createLink($source["linkPath"], $source["name"]);
        }
    }
    $charHtml .= "</p>";


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

    // Ingredients
    $charHtml .= "<p><b>Ingredients:</b> ";
    foreach($monsterJson["Ingredients"] as $ingredient) {
        $charHtml .= createLink($ingredient["linkPath"], $ingredient["name"]);
    }
    $charHtml .= "</p>";

    echo $charHtml;
}*/

function appbar() {
    $dirs = array_filter(glob(dirname(__FILE__).'/*'), 'is_dir');
    $toolbarButtons = "";
    foreach ($dirs as $dir) {
        $pathArr = explode("/", $dir);
        $title = $pathArr[count($pathArr)-1];
        // TODO make this so its not hard coded url
        $toolbarButtons .= "<div class='tabButton' onclick=\"location.href='http://localhost/d_and_d_cookoff/$title';\">$title</div>";
    }
    echo "<div class='appbar'>
        <a href='/d_and_d_cookoff'>Home</a>".
        searchbar().
        $toolbarButtons
    ."</div>";
}

function searchbar() {
    return '<form action="/d_and_d_cookoff/search.php" method="get">
        <input type="text" name="file">
        <button type="submit">Search</button>
    </form>';
}

function genericJsonRender($json) {
    $newHtml = "";

    // Hardcoded that if json has linkPath and name field it is intended to be a link
    if (array_key_exists("linkPath", $json) && array_key_exists("name", $json)) {
        $newHtml .= createLink($json["linkPath"], $json["name"]);
        return $newHtml;
    }

    foreach ($json as $key => $value) {
        if (is_array($value)) {
            if(!is_numeric($key)) {
                $newHtml .= "<p><b>".$key.":</b> ";
                $newHtml .= genericJsonRender($value);
                $newHtml .= "</p>";
            } else {
                $newHtml .= genericJsonRender($value);
            }
        } else if(is_numeric($key)) {
            // If key is numeric assume its a numbered list and key does not need to be printed
            $newHtml .= $value;
        } else {
            $newHtml .= "<p><b>".$key.":</b> ".$value."</p>";
        }
    }

    return $newHtml;
}

function createNewFileButton() {
    $path = str_replace("\\", "/" , getcwd());
    $newPage = $path."/NewPage";
    $relativePath = getRelativePath($path);
    return "<script type='text/javascript' src='".$relativePath."CommonFunctions.js'></script>
    <form action='/#' onsubmit='event.preventDefault(); callPHPUtilityFunction(\"createNewPage\", fetchNewPagePath(\"$path\"), \"$relativePath\");'>
        <input type='text' id='newPageName' />
        <input type='submit' value='Add New Page'/>
    </form>
    ";
}

function getCurrentRelativePath() {
    $path = str_replace("\\", "/" , getcwd());
    return  getRelativePath($path);
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
        <?php appbar(); ?>
        <div class="appContent">
            <?php
                generateHeader();
                displayDirectory();
			    echo createNewFileButton();
            ?>
        </div>
    </body>
    </html>';
}

?>