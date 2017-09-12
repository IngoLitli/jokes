<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $sql = 'SELECT
  jokes.id, jokeText, jokeDate, updateDate, authors.name as "author", group_concat(categories.name) as "categories"
FROM
  jokes
  LEFT JOIN authors ON jokes.id_author = authors.id
  LEFT JOIN jokecategory ON jokes.id = jokecategory.id_joke
  LEFT JOIN categories ON jokecategory.id_category = categories.id
WHERE 
    MATCH (jokeText) AGAINST(:text IN BOOLEAN MODE) 
    OR MATCH(authors.name) AGAINST(:author IN BOOLEAN MODE)
    OR MATCH(categories.name) AGAINST(:categories IN BOOLEAN MODE)
GROUP BY jokes.id;';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $textSample);
        $s->bindValue(':author', $author);
        $s->bindValue(':categories', $categories);
        $s->execute();
        $result = $s;
    }
    catch (PDOException $e){
    $error = 'Error fetching author details.'.$e;
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
    exit();
}
?>