<?php
// get raw input
$name = $_GET['name'] ?? '';
// basic validation: remove unexpected chars (letters, spaces, hyphen)
$name = preg_replace('/[^\p{L}\s\-]/u','',$name);
//escape for safe HTML output
$safe = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
?>
