<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/jokes/worker.php'?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/workers/htmlSpecialChars.php'?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Jokes</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/jokes.css">
    <link rel="stylesheet" type="text/css" href="../css/filter.css">
    <!-- Scripts Below -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../workers/front/filter.js"></script>
</head>
    <body>
    <h1>Manage Jokes</h1>
    <p id="test"></p>
    <p class="addNewButton"><a href="worker.php?add">Add new joke</a></p>
    <table id="filterTable">
        <thead>
        <tr>
            <th class="title">Joke</th>
            <th class="title">Author</th>
            <th class="title">Categories</th>
            <th class="title">Date Created</th>
            <th class="title">Date Updated</th>
            <th>
                <div id="filter">
                    <label id="filterLabel" for="filter">Filter</label>
                    <input type="text" class="search form-control" id="filter" placeholder="What you looking for?">
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($jokes as $joke):?>
            <form action="" method="post">
                <tr>
                    <td class="jokeText"><?php echo html($joke['text']);?></td>
                    <td><?php echo html($joke['author']); ?></td>
                    <td class="jokeCategories"><?php echo html($joke['category']); ?></td>
                    <td class="jokeDate"><?php echo html($joke['date']); ?></td>
                    <td class="jokeDate"><?php echo html($joke['updateDate']); ?></td>
                    <input type="hidden" name="id" value="<?php echo $joke['id']; ?>" id="name">
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