<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=database', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}

catch (PDOException $e){
    $error = 'Unable to connect to database' . $e->getMessage();
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
    exit();
}
?>