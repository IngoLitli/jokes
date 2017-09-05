<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $result = $pdo->query('SELECT id, jokeText, jokeDate FROM jokes');
    }
    catch (PDOException $e){
    $error = 'Error fetching author details.';
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
    exit();
}
?>