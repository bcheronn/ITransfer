<?php
// Do nothing if there is no file
if (count($_FILES) <> 0) {
    // Debug dump
    echo "Debugging info:";
    var_dump('$_POST', $_POST, '$_REQUEST', $_REQUEST, '$_FILES', $_FILES);
    echo "<hr>";

    $uploaddir = 'inbox/';
    $uploadfile = $uploaddir . basename($_FILES["files"]["name"][0]);

    // Move received files
    echo '<pre>';
    if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }
    print "</pre>";
}
