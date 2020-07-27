<?php
    var_dump($GLOBALS);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITransfer</title>
</head>

<body>
    <main>
        <form id="files-submitter" enctype="multipart/form-data" method="post">
            <div>
                <label for="files">Fichier(s) : </label><input type="file" name="files" id="files" autofocus multiple required="required"></div>
            <div>
                <label for="from">Expéditeur : </label><input type="email" name="from" id="from" required="required">
            </div>
            <div>
                <label for="to">Destinataire : </label><input type="email" name="to" id="to" required="required">
            </div>
            <div>
                <label for="body">Message : </label><input type="text" name="body" id="body">
            </div>
            <div>
                <input type="submit" name="send" id="send">
            </div>
        </form>
    </main>
</body>

</html>