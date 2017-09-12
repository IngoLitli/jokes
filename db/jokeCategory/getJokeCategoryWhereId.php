<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $sql = 'SELECT id_category FROM jokecategory WHERE id_joke = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $id);
        $s->execute();
    }
    catch (PDOException $e){
        $error = 'Error fetching category details.' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
        exit();
    }

    $result = $s->fetchALL();
?>