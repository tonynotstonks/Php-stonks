<?php
// Repository: php-file-upload-validator
// Description: A script to handle file uploads with validation for type and size.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Validate file type and size
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxSize = 2 * 1024 * 1024; // 2MB

        if (!in_array($file['type'], $allowedTypes)) {
            die("Error: Only JPEG and PNG files are allowed.");
        }

        if ($file['size'] > $maxSize) {
            die("Error: File size exceeds 2MB.");
        }

        // Move uploaded file to a directory
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $destination = $uploadDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    }
}
?>
<!-- HTML Form -->
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>
