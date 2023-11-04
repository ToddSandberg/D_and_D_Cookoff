<?php require_once("Error.php"); ?>

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

    $fileName = $_GET['file'];
    $filepath = rglob('*/'.$fileName.'.txt/');

    if (is_null($filepath) || empty($filepath)) {
        // If text file with name not found search for directory
        $filepath = rglob('*/'.$fileName.'/');
    } 
    
    if (is_null($filepath) || empty($filepath)) {
        renderErrorPage("File/Folder with name $fileName not found.");
    } else {
        header('Location: ' . $filepath[0], true, ($permanent === true) ? 301 : 302);
    }

    die();
?>
</body>
</html>