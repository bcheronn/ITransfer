<?php
// Debug dump
echo "Debugging info:\r\n";
var_dump('$_GET', $_GET);
echo "<hr>\r\n<pre>\r\n";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITransfer</title>
</head>

<body>
    <main>
        Click to download your <a href="http://itransfer/inbox/<?= $_GET["id"] ?>">file</a>
    </main>
</body>

</html>