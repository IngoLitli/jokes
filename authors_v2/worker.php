<?php

if (isset($_GET['add'])){
    $pageTitle = 'New author';
    $action = 'addform';
    $name = '';
    $email = '';
    $id = '';
    $button = 'Add author';
    include 'form.php';
    exit();
}

if (isset($_GET['addform'])){
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/insertAuthor.php';

    header('Location: .');
    exit();
}

if (isset($_POST['action']) and  $_POST['action'] == 'Edit'){
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/getAuthorWhereId.php';
    $pageTitle = 'Edit author';
    $action = 'editform';
    $name = $row['name'];
    $email = $row['email'];
    $id = $row['id'];
    $button = 'Update author';

    include 'form.php';
    exit();
}

if (isset($_GET['editform'])){
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/updateAuthor.php';

    header('Location: .');
    exit();
}

if (isset($_POST['action']) and  $_POST['action'] == 'Delete') {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/deleteAuthor.php';
    header('Location: .');
    exit();
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/getAuthor.php';



foreach ($result as $row){
    $authors[] = array('id' => $row['id'], 'name' => $row['name'], 'email' => $row['email']);
}


?>