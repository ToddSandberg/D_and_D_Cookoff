<?php
    require_once("CommonFunctions.php");

    //https://stackoverflow.com/questions/15757750/how-can-i-call-php-functions-by-javascript
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'createNewPage':
               $path = $_POST['arguments'];
               mkdir($path);
               $newFile = fopen($path.'/index.php', "w");
               fwrite($newFile, getBasePageHTML());
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>