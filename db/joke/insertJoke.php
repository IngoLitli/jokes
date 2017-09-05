<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $sql = 'INSERT INTO jokes SET jokeText = :text, jokeDate = :date';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $_POST['text']);
        if ($_POST['date'] != ""){
            $s->bindValue(':date', $_POST['date']);
        }else{
            $now = new DateTime(date("Y-m-d H:i:s"));
            $now = $now->format("Y-m-d H:i:s");
            $s->bindValue(':date', $now);
        }
        $s->execute();
    }
    catch (PDOException $e){
        $error = 'Error adding submitted joke.' . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
        exit();
    }
?>