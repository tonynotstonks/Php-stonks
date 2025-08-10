<?php
// Repository: php-file-search-engine
// Description: Search for files containing specific keywords in a directory.

function searchFiles($dir, $keyword) {
    $results = [];
    foreach (scandir($dir) as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_file($path) && strpos(file_get_contents($path), $keyword) !== false) {
            $results[] = $path;
        }
    }
    return $results;
}

$directory = __DIR__;
$keyword = "example";
$results = searchFiles($directory, $keyword);

if (!empty($results)) {
    echo "Files containing '$keyword':\n";
    foreach ($results as $file) {
        echo "- $file\n";
    }
} else {
    echo "No files found containing '$keyword'.\n";
}
?>
