<?php

if (isset($_GET['add'])){
    $pageTitle = 'New joke';
    $action = 'addform';
    $text = '';
    $date = '';
    $id = '';
    $button = 'Add joke';
    include 'form.php';
    exit();
}

if (isset($_GET['addform'])){
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/joke/insertJoke.php';

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
    $button = 'Update joke';

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
    $jokes[] = array('id' => $row['id'], 'text' => $row['jokeText'], 'date' => $row['jokeDate']);
}


?>