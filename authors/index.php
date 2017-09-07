<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/authors/worker.php'?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/workers/htmlSpecialChars.php'?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Authors</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" href="../css/filter.css" type="text/css">
    <!-- Scripts Below -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../workers/front/filter.js"></script>
</head>
<body>
<h1>Manage Authors</h1>
<p class="addNewButton"><a href="worker.php?add">Add new author</a></p>
<table id="filterTable">
    <thead>
        <tr>
            <th class="title">Name</th>
            <th class="title">Email</th>
            <th>
                <div id="filter">
                    <label id="filterLabel" for="filter">Filter</label>
                    <input type="text" class="search form-control" id="filter" placeholder="What you looking for?">
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($authors as $author): ?>
            <form action="" method="post">
                <tr>
                    <td><?php echo html($author['name']); ?></td>
                    <td><?php echo html($author['email']); ?></td>
                    <input type="hidden" name="id" value="<?php echo $author['id']; ?>" id="name">
                    <td><input type="submit" name="action" value="Edit" id="editButton" class="button">
                    <input type="submit" name="action" value="Delete" id="deleteButton" class="button"></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </tbody>
</table>
<p class="homeButton"><a href="..">Return to home</a></p>
</body>
</html>