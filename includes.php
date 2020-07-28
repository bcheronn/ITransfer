<?php
$numberOfFiles = count($_FILES); // Number of files received

// Do nothing if there is no file
if ($numberOfFiles <> 0) {
    // Debug dump
    echo "Debugging info:";
    var_dump('$_POST', $_POST, '$_REQUEST', $_REQUEST, '$_FILES', $_FILES);
    echo "<hr>";

    // Received files management. Move them to inbox
    $inboxPath = "inbox/";

    echo '<pre>';
    foreach ($_FILES["files"]["error"] as $key => $fileError) {
        if ($fileError == UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $inboxPath . $_FILES["files"]["name"][$key])) {
                echo "File is valid, and was successfully uploaded.\n";
            } else {
                echo "Possible file upload attack!\n";
            };
        }
    }
    print "</pre>";
}
