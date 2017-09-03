<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/authors/worker.php'?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/workers/htmlSpecialChars.php'?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Authors</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
</head>
<body>
<h1>Manage Authors</h1>
<p class="addNewButton"><a href="worker.php?add">Add new author</a></p>
<table>
    <tr>
        <th class="title">Name</th>
        <th class="title">Email</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($authors as $author): ?>
        <form action="" method="post">
            <tr>
                <td><?php echo html($author['name']); ?></td>
                <td><?php echo html($author['email']); ?></td>
                <input type="hidden" name="id" value="<?php echo $author['id']; ?>" id="name">
                <td><input type="submit" name="action" value="Edit" id="editButton" class="button"></td>
                <td><input type="submit" name="action" value="Delete" id="deleteButton" class="button"></td>
            </tr>
        </form>
    <?php endforeach; ?>
</table>
<p class="homeButton"><a href="..">Return to home</a></p>
</body>
</html>