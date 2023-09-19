<html>
<body>
<?php
// directory scan
function rglob($pattern, $flags = 0) {
    $files = glob($pattern, $flags); 
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}

$filepath = rglob('*/'.$_GET['file'].'.txt/');

if (is_null($filepath) || empty($filepath)) {
    echo 'filepath was null';
    $filepath = rglob('*/'.$_GET['file'].'/');
}

//echo $filepath[0];
header('Location: ' . $filepath[0], true, ($permanent === true) ? 301 : 302);
die();
?>
</body>
</html>