<?php
$numberOfFiles = count($_FILES); // Number of files received

// Do nothing if there is no file
if ($numberOfFiles <> 0) {
    // Debug dump
    echo "Debugging info:\r\n";
    var_dump('$_POST', $_POST, '$_REQUEST', $_REQUEST, '$_FILES', $_FILES);
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
        if ($fileError == UPLOAD_ERR_OK) {
            // Move the file to inbox
            $fileToArchive = $inboxPath . $_FILES["files"]["name"][$key];
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $fileToArchive)) {
                echo "File is valid and successfully uploaded to " . $fileToArchive . ".\r\n";
                // Add it to the zip archive
                if ($archive->addFile($fileToArchive, basename($fileToArchive))) {
                    echo "File successfully added to archive " . $archiveName . "\r\n";
                    // Delete the archived file
                } else {
                    echo "File archiving error!\r\n";
                }
            } else {
                echo "Possible file upload attack!\r\n";
            }
        } else {
            echo "File upload error!\r\n";
        }
    }

    // Close the archive properly
    if ($archive->close() !== TRUE) {
        echo "Error closing $archiveName!\r\n";
    }
    echo "</pre>\r\n";
}
