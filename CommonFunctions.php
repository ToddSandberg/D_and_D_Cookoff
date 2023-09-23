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

function generateHeader() {
    echo "<h1><a href='/d_and_d_cookoff'>D&D Cookoff</a></h1><h3>".basename(getcwd())."</h3>";
}

?>