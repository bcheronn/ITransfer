<?php
$numberOfFiles = count($_FILES); // Number of files received

// Do nothing if there is no file
if ($numberOfFiles <> 0) {
    // Debug dump
    echo "Debugging info:\r\n";
    var_dump('$_POST', $_POST, '$_FILES', $_FILES);
    echo "<hr>\r\n<pre>\r\n";

    // Variables declaration and definition
    $inboxPath = "inbox/";
    $archive = new ZipArchive();
    $archiveName = uniqid("IT") . ".zip";
    $archivePath = $inboxPath . $archiveName;

    if ($archive->open($archivePath, ZipArchive::CREATE) !== TRUE) {
        echo "Error opening $archiveName!\r\n";
    }

    // Received files management. Move them to inbox
    // For all received files
    foreach ($_FILES["files"]["error"] as $key => $fileError) {
        // When no upload error 
        if ($fileError === UPLOAD_ERR_OK) {
            $fileToArchive = $_FILES["files"]["tmp_name"][$key];
            echo "File " . $fileToArchive . " is valid and successfully uploaded.\r\n";
            // Add the received file to the zip archive
            if ($archive->addFile($fileToArchive, basename($_FILES["files"]["name"][$key]))) {
                echo "File successfully added to archive " . $archiveName . "\r\n";
                // Delete the archived file
            } else {
                echo "File archiving error!\r\n";
            }
        } else {
            echo "File upload error!\r\n";
        }
    }

    // Close the archive properly
    if ($archive->close() !== TRUE) {
        echo "Error closing $archiveName!\r\n";
    }

    // Mail notification
    // Create the Transport
    if ($_SERVER["SERVER_NAME"] === "itransfer") {
        echo "Using Mailtrap for development.\r\n";
        // Local SMTP mailtrap
        $transport = (new Swift_SmtpTransport("smtp.mailtrap.io", 465))
            ->setUsername("772fbdfbf02416")
            ->setPassword("a22403c46020d8");
    } else {
        echo "Using production MTA.\r\n";
        // Production SMTP client - Unix/Linux servers only
        $transport = new Swift_SendmailTransport();
    }

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Prepare the message
    $body = "Copy that link in your browser to download the file: http://itransfer/download?id=" . $archiveName . "\r\n";
    $body .= $_POST["body"];

    // Prepare the HTML message
    $HTMLbody = "<!DOCTYPE html><html lang=fr><head><title>ITransfer file notification</title></head><body>";
    $HTMLbody .= "Click to download the <a href=\"http://itransfer/download?id=" . $archiveName . "\">file</a><br><p>";
    $HTMLbody .= $_POST["body"];
    $HTMLbody .= "</p></body></html>";

    // Create a message
    $message = (new Swift_Message("ITransfer file notification"))
        ->setFrom([$_POST["from"]])
        ->setTo([$_POST["to"]])
        ->setBody($body)
        ->addPart($HTMLbody, "text/html");

    // Send the message
    $result = $mailer->send($message);
    echo "</pre>\r\n";
}
