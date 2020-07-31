<?php
require_once("vendor/autoload.php"); // Load the vendor packages
require_once("includes.php"); // Load the required logic
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITransfer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body class="bg-dark text-white-50">
    <main class="container">
        <!-- Create the form for file updloads, including the emails and an optional message -->
        <form id="files-submitter" enctype="multipart/form-data" method="post" class="m-5">
            <div class="form-group">
                <label for="files">File(s)</label>
                <input type="file" name="files[]" id="files" autofocus multiple required="required" class="form-control-file" />
            </div>
            <div class="form-group">
                <label for="from">Sender</label>
                <input type="email" name="from" id="from" required="required" value="from.username@domain.tld" class="form-control" />
            </div>
            <div class="form-group">
                <label for="to">Recipient</label>
                <input type="email" name="to" id="to" required="required" value="to.username@domain.tld" class="form-control" />
            </div>
            <div class="form-group">
                <label for="body">Message</label>
                <textarea name="body" id="body" class="form-control">Here are the files you were looking for :)
                </textarea>
            </div>
            <input type="submit" name="send" id="send" class="btn btn-secondary" lang="en" />
        </form>
    </main>
</body>

</html>