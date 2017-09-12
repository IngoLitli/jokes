<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $sql = 'UPDATE jokes SET jokeText = :text, id_author = :author, updateDate = DEFAULT WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $_POST['text']);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':author', $_POST['author']);
        $s->execute();
    }
    catch (PDOException $e){
        $error = 'Error updating submitted joke.';
        include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
        exit();
    }

    try{
        $sql = 'DELETE FROM jokecategory WHERE id_joke = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e){
        $error = 'Error deleting joke categories.' . $e;
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
                $s -> bindValue(':jokeid' , $_POST['id']);
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