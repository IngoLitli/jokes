<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/dump.php';

    try{
        $sql = 'INSERT INTO jokes SET jokeText = :text, jokeDate = :date, id_author = :author;';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $_POST['text']);
        if ($_POST['date'] != ""){
            $s->bindValue(':date', $_POST['date']);
        }else{
            $now = new DateTime(date("Y-m-d H:i:s"));
            $now = $now->format("Y-m-d H:i:s");
            $s->bindValue(':date', $now);
        }
        $s->bindValue(':author', $_POST['author']);
        $s->execute();
        $jokeid = $pdo->lastInsertId();
    }
    catch (PDOException $e){
        $error = 'Error adding submitted joke.' . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
        exit();
    }

if (isset($_POST['categories'])) {
        try{
            $sql = "INSERT INTO
                jokecategory
                SET
                id_category = :categoryid, id_joke = :jokeid;";
            $s = $pdo->prepare($sql);
            foreach ($_POST['categories'] as $category){
                $s -> bindValue(':jokeid' , $jokeid);
                $s -> bindValue(':categoryid' , intval($category));
                $s->execute();
            }
        }
        catch (PDOException $e){
            $error = 'Error adding submitted joke.' . $e;
            include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
            exit();
        }
    }
?>