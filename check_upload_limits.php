<?php
echo "<h2>PHP File Upload Limits</h2>";
echo "<strong>upload_max_filesize:</strong> " . ini_get('upload_max_filesize') . "<br>";
echo "<strong>post_max_size:</strong> " . ini_get('post_max_size') . "<br>";
echo "<strong>memory_limit:</strong> " . ini_get('memory_limit') . "<br>";

// Convert to bytes for debugging
function convertToBytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    $val = (int)$val;
    switch($last) {
        case 'g': $val *= 1024;
        case 'm': $val *= 1024;
        case 'k': $val *= 1024;
    }
    return $val;
}

echo "<hr>";
echo "<strong>upload_max_filesize (bytes):</strong> " . convertToBytes(ini_get('upload_max_filesize')) . "<br>";
echo "<strong>post_max_size (bytes):</strong> " . convertToBytes(ini_get('post_max_size')) . "<br>";
?>
