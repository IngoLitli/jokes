<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/dump.php';

$variable = $_POST['selection'];

if (isset($_POST['action'])){
    /*$variable = $_POST['variable'];
    $whereClause = "";
    if ($_POST['selection'] == "jokeSearch"){
        $whereClause = "MATCH (jokes.jokeText) AGAINST('{$variable}' IN BOOLEAN MODE)";
    }
    //include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/searchEngine/getJoke2.php';
*/
    $author = $_POST['author'];
    $textSample = $_POST['jokeText'];
    $categories = $_POST['categories'];
    $date = $_POST['date'];
    $categoryQuery = '';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/searchEngine/getJoke.php';

}
foreach ($result as $row){
    $jokes[] = array('id' => $row['id'],
        'text' => $row['jokeText'],
        'date' => $row['jokeDate'],
        'updateDate' => $row['updateDate'],
        'author' => $row['author'],
        'category' => $row['categories']);
}
?>