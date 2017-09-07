<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/workers/htmlSpecialChars.php';?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo html($pageTitle);?></title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/inputValidate.css">
</head>
<body>

<h1><?php echo html($pageTitle);?></h1>
<form action="?<?php echo html($action);?>" method="post">
    <div>
        <label for="text">Joke:</label>
        <input type="text" name="text" id="text" value="<?php echo html($text);?>" required>
        <label for="date">Date:</label>
        <input type="text" name="date" id="date" value="<?php echo html($date);?>" placeholder="YYYY-MM-DD HH:MM:SS" pattern="[0-9]{4}[-][0-9]{2}[-][0-9]{2}[ ][0-9]{2}[:][0-9]{2}[:][0-9]{2}">
        <label for="author">Author:</label>
        <select name="author" id="author">
            <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/author/getAuthor.php';
            foreach ($result as $row):
                echo "<option value='{$row['id']}'";
                if ($row['id'] == $id_author){echo 'selected';};
                echo ">{$row['name']}</option>";
            endforeach;
            ?>
        </select>
        <div id="categories">
            <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/db/category/getCategory.php';
            foreach ($result as $row):
                echo "<input type='checkbox' name='categories[]' value='{$row['id']}'";
                foreach ($activeCategories as $category){
                    if ($row['id'] == $category){
                        echo 'checked';
                    }
                }
                echo ">{$row['name']}</br>";
            endforeach;
            ?>
        </div>
    </div>
    <div>
        <input type="hidden" name="id" class="valReq" value="<?php echo html($id)?>">
        <input type="submit" value="<?php echo html($button);?>">
    </div>
</form>
</body>
</html>
