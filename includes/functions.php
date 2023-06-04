<?php

function image_upload($field)
{
    $allowed_types = array('image/png', 'image/jpeg', 'image/jpg');
    // Check if file was uploaded without errors
    if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
        $file_type   = $_FILES[$field]['type'];
        $targetDir   = 'book_covers_uploaded/';
        $randomName  = uniqid();
        $tempFile    = $_FILES[$field]['tmp_name'];
        $extension   = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
        $newFileName = $randomName . '.' . $extension;
        $targetFile  = $targetDir . $newFileName;

        if (in_array($file_type, $allowed_types)) {
            // Move uploaded file to desired location
            if (move_uploaded_file($tempFile, $targetFile)) {
                $field      = $targetFile;
                echo "File uploaded successfully.";
            } else {
                echo "Error ! File not uploaded.";
                return false;
            }
        } else {
            echo "Invalid file type. Only PNG, JPG, and JPEG files are allowed.";
            return false;
        }
    } else {
        $field = 'book_covers_uploaded/default_book_cover.jpg';
    }
    return $field;
}