<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $sql = 'UPDATE jokes SET jokeText = :text, jokeDate = :date WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $_POST['text']);
        $s->bindValue(':date', $_POST['date']);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e){
        $error = 'Error updating submitted joke.';
        include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
        exit();
    }
?>