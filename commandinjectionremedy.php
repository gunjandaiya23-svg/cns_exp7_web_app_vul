<?php
// Get user input
$host = $_GET['host'] ?? '';

// Basic validation: allow only letters, numbers, dots, hyphens
if (!preg_match('/^[a-zA-Z0-9\.\-]+$/', $host)) {
    die("Invalid host.");
}
