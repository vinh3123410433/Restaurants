<?php

if (!defined('HOST')) {
    define('HOST', 'localhost');
}

if (!defined('DBNAME')) {
    define('DBNAME', 'restoran');
}

if (!defined('USER')) {
    define('USER', 'root');
}

if (!defined('PASS')) {
    define('PASS', '');
}

try {
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Uncomment this line to check connection
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>