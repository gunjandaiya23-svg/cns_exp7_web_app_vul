<?php
$mysqli = new mysqli('localhost','dvwauser','dvwapass','dvwa');
if ($mysqli->connect_errno) {
    error_log("MySQL connect error: " . $mysqli->connect_error);
    die("DB error.");
}

// safe select
$id = $_GET['id'] ?? '';
if (!filter_var($id, FILTER_VALIDATE_INT)) die("Invalid id.");

$stmt = $mysqli->prepare('SELECT id, username FROM users WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$user = $res->fetch_assoc();
$stmt->close();

echo htmlspecialchars($user['username'] ?? 'Not found', ENT_QUOTES, 'UTF-8');

// storing password
$plain = $_POST['password'];
$hash = password_hash($plain, PASSWORD_DEFAULT); // bcrypt/argon2 depending on PHP version

// save $hash into users.password_hash column
