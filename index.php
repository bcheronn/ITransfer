<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITransfer</title>
</head>

<body>
    <main>
        <form id="files-submitter" enctype="multipart/form-data">
            <div>
                <label for="files">Fichier(s) : </label><input type="file" name="files" id="files" autofocus multiple required="required"></div>
            <div>
                <label for="to">Destinataire : </label><input type="" name="to" id="to">
            </div>
            <div>
                <label for="from">Expéditeur : </label><input type="" name="from" id="from">
            </div>
            <div>
                <label for="body">Message : </label><input type="" name="body" id="body">
            </div>
        </form>
    </main>
</body>

</html>