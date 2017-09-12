<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/workers/htmlSpecialChars.php';?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo html($pageTitle);?></title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/jokesForm.css">
    <link rel="stylesheet" type="text/css" href="../css/inputValidate.css">
</head>
    <body>

    <h1><?php echo html($pageTitle);?></h1>
    <form action="?<?php echo html($action);?>" method="post">
        <div>
            <label for="text">Joke:</label>
            <input type="text" name="text" id="text" value="<?php echo html($text);?>" required>
            <label for="author">Author:</label>
            <select name="author" id="author">
                <?php
                foreach ($authors as $author):?>
                    <option value='<?php echo $author['id'];?>'
                        <?php
                            if ($author['id'] == $id_author){
                                echo 'selected';
                            }
                        ?>>
                    <?php echo $author['name']; ?>
                    </option>
                <?php endforeach;?>
            </select>
        </div>
        <form class="categoriesContainer">
            <fieldset class="categoriesContainer">
                <legend>Categories</legend>
                <div id="divContainer">
                    <?php foreach ($categories as $category):?>
                    <div class='categoryInput'>
                        <label for="<?php echo html($category['id']);?>">
                        <input class="category" type="checkbox" name="categories[]" value="<?php echo html($category['id']);?>"
                        id="<?php echo html($category['id']);?>"
                        <?php
                            if ($category['selected']){
                                echo 'checked';
                            }
                        ?>><?php echo html($category['name']); ?></label>
                    </div>
                    <?php endforeach;?>
                </div>
            </fieldset>
            <div>
                <input type="hidden" name="id" class="valReq" value="<?php echo html($id)?>">
                <input type="submit" value="<?php echo html($button);?>">
            </div>
        </form>
    </body>
</html>
