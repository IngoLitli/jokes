<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/categories/worker.php'?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/workers/htmlSpecialChars.php'?>

<!DOCTYPE html>
<html>
    <head>
        <title>Manage Categories</title>
        <link rel="stylesheet" href="../css/master.css" type="text/css">
    </head>
    <body>
        <h1>Manage Categories</h1>
        <p class="addNewButton"><a href="worker.php?add">Add new category</a></p>
        <ul>
            <?php foreach ($categories as $category):?>
            <li>
                <form action="" method="post"
                <div class="container">
                    <p><?php echo html($category['name']); ?></p>
                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>" id="name">
                    <input type="submit" name="action" value="Edit" id="editButton" class="button">
                    <input type="submit" name="action" value="Delete" id="deleteButton" class="button">
                </div>
                </form>
            </li>
            <?php endforeach; ?>
        </ul>
        <p class="homeButton"><a href="..">Return to home</a></p>
    </body>
</html>