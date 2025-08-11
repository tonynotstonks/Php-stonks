<?php
// Repository: php-file-upload-validator
// New Feature: Generate a unique filename to avoid overwriting

$destination = $uploadDir . uniqid() . "_" . basename($file['name']);
if (move_uploaded_file($file['tmp_name'], $destination)) {
    echo "File uploaded successfully with unique name: $destination";
} else {
    echo "Error uploading file.";
}
?>
