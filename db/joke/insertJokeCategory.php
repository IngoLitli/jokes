<?php
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