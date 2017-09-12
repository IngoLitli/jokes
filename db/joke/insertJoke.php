<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/dump.php';

    try{
        $sql = 'INSERT INTO jokes SET jokeText = :text, id_author = :author;';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $_POST['text']);
        $s->bindValue(':author', $_POST['author']);
        $s->execute();
        $jokeid = $pdo->lastInsertId();
    }
    catch (PDOException $e){
        $error = 'Error adding submitted joke.' . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
        exit();
    }

?>