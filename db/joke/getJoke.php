<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/dbConnect.php';

    try{
        $result = $pdo->query('SELECT
  jokes.id, jokeText, jokeDate, authors.name as "author", group_concat(categories.name) as "categories"
FROM
  jokes
  /*LEFT JOIN jokeAuthor ON jokes.id = jokeAuthor.id_joke
  LEFT JOIN authors ON jokeAuthor.id_author = authors.id*/
  LEFT JOIN authors ON jokes.id_author = authors.id
  LEFT JOIN jokecategory ON jokes.id = jokecategory.id_joke
  LEFT JOIN categories ON jokecategory.id_category = categories.id
GROUP BY jokes.id;');
    }
    catch (PDOException $e){
    $error = 'Error fetching author details.';
    include $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/error/error.php';
    exit();
}
?>