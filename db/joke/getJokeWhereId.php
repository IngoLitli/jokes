<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $sql = 'SELECT
                  id, jokeText, jokeDate, id_author, group_concat(jokecategory.id_category) AS "categories"
                FROM
                  jokes
                  LEFT JOIN jokecategory ON jokes.id = jokecategory.id_joke
                WHERE
                  id = :id
                GROUP BY jokes.id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e){
        $error = 'Error fetching joke details.' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
        exit();
    }

    $row = $s->fetch();
?>