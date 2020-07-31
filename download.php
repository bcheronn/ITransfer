<?php
// Debug dump
/* echo "Debugging info:\r\n";
var_dump('$_GET', $_GET);
echo "<hr>\r\n<pre>\r\n"; */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITransfer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        Click to download your <a href="http://itransfer/inbox/<?= $_GET["id"] ?>">file</a>
    </main>
</body>

</html>