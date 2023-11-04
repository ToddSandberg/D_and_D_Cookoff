<?php
    function renderErrorPage($error) {
        echo '<!DOCTYPE html>
        <html>
            <head>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link rel="stylesheet" href="index.css">
            </head>
            <body>
                <h1><a href="/d_and_d_cookoff">Home</a></h1>
                <h3>Error :(</h3>
                <p>'.$error.'</p>
            </body>
        </html>';
    }
?>