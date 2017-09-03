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
        <table>
            <?php foreach ($categories as $category):?>
                <form action="" method="post">
                <tr>
                    <td><?php echo html($category['name']); ?></td>
                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>" id="name">
                    <td><input type="submit" name="action" value="Edit" id="editButton" class="button"></td>
                    <td><input type="submit" name="action" value="Delete" id="deleteButton" class="button"></td>
                </tr>
                </form>
            <?php endforeach; ?>
        </table>
        <p class="homeButton"><a href="..">Return to home</a></p>
    </body>
</html>