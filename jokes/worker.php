<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/dump.php';


if (isset($_GET['add'])){
    $pageTitle = 'New joke';
    $action = 'addform';
    $text = '';
    $date = '';
    $id = '';
    $button = 'Add joke';

    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/getAuthor.php';
    foreach ($result as $row):
        $authors[] = array('id' => $row['id'], 'name' => $row['name']);
    endforeach;

    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/category/getCategory.php';
    foreach ($result as $row):
        $categories[] = array('id' => $row['id'], 'name' => $row['name']);
    endforeach;

    include 'form.php';
    exit();
}

if (isset($_GET['addform'])){
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/joke/insertJoke.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/joke/insertJokeCategory.php';

    header('Location: .');
    exit();
}

if (isset($_POST['action']) and  $_POST['action'] == 'Edit'){
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/joke/getJokeWhereId.php';

    $pageTitle = 'Edit joke';
    $action = 'editform';
    $text = $row['jokeText'];
    $date = $row['jokeDate'];
    $id = $row['id'];
    $id_author = $row['id_author'];
    $activeCategories[] = array();
    foreach ($row['categories'] as $category){
        $activeCategories[] = array("id"=>$category);
    }
    $button = 'Update joke';

    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/getAuthor.php';
    foreach ($result as $row):
        $authors[] = array('id' => $row['id'], 'name' => $row['name']);
    endforeach;

    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/jokeCategory/getJokeCategoryWhereId.php';
    foreach ($result as $row){
        $selectedCategories[] = $row['id_category'];
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/category/getCategory.php';
    foreach ($result as $row):
        $categories[] = array('id' => $row['id'], 'name' => $row['name'], 'selected' => in_array($row['id'], $selectedCategories));
    endforeach;

    include 'form.php';
    exit();
}

if (isset($_GET['editform'])){
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/joke/updateJoke.php';
    header('Location: .');
    exit();
}

if (isset($_POST['action']) and  $_POST['action'] == 'Delete') {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/joke/deleteJoke.php';
    header('Location: .');
    exit();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/joke/getJoke.php';


foreach ($result as $row){
    $jokes[] = array('id' => $row['id'],
        'text' => $row['jokeText'],
        'date' => $row['jokeDate'],
        'updateDate' => $row['updateDate'],
        'author' => $row['author'],
        'category' => $row['categories']);
}


?>