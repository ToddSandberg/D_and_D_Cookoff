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
//echo $filepath[0];
header('Location: ' . $filepath[0], true, ($permanent === true) ? 301 : 302);
die();
?>
</body>
</html>