<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/search/worker.php'?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/nemendur/ingvaroli/jokes/workers/htmlSpecialChars.php'?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Jokes</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/jokes.css">
    <link rel="stylesheet" type="text/css" href="../css/filter.css">
    <link rel="stylesheet" type="text/css" href="../css/searchEngine.css">
    <!-- Scripts Below -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../workers/front/filter.js"></script>
</head>
<body>
<h1>Search Engine</h1>
<p id="test"></p>
<table id="filterTable">
    <thead>
    <tr style="border-bottom: rgb(0,0,0) 1px solid;">
        <th colspan="4">
            <div style="width: 100%; margin: 0 auto;">
                <form action="" method="post">
                    <!--<label for="selection">Selection:</label>
                    <select name="selection" id="selection">
                        <option value="authorSearch" <?php if ($variable == "authorSearch"){echo "selected";};?>>Author</option>
                        <option value="jokeSearch" <?php if ($variable == "jokeSearch"){echo "selected";};?>>Joke</option>
                        <option value="categoriesSearch" <?php if ($variable == "categoriesSearch"){echo "selected";};?>>Categories</option>
                        <option value="dateSearch" <?php if ($variable == "dateSearch"){echo "selected";};?>>Date</option>
                    </select>
                    <input type="text" name="variable" id="searchBar" value="<?php echo $variable;?>">-->
                    <label for="authorSearch">Author name:
                        <input type="text" name="author" id="authorSearch" value="<?php echo $author;?>">
                    </label>
                    <label for="jokeSearch">Joke:
                        <input type="text" name="jokeText" id="jokeSearch" value="<?php echo $textSample;?>">
                    </label>
                    <br/>
                    <label for="categoriesSearch">Categories:
                        <input type="text" name="categories" id="categoriesSearch" value="<?php echo $categories;?>">
                    </label>
                    <label for="dateSearch">Date Created:
                        <input type="date" name="date" id="dateSearch">
                    </label>
                    <br/>
                    <input type="submit" name="action" value="SEARCH">
                </form>
            </div>
        </th>
        <th>
            <div id="filter" style="text-align: center;">
                <label id="filterLabel" for="filter">Filter</label>
                <input type="text" class="search form-control" id="filter" placeholder="What you looking for?">
            </div>
        </th>
    </tr>
    <tr class="titles">
        <th class="title">Joke</th>
        <th class="title">Author</th>
        <th class="title">Categories</th>
        <th class="title">Date Created</th>
        <th class="title">Date Updated</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($jokes as $joke):?>
        <form action="" method="post">
            <tr>
                <td class="jokeText"><?php echo html($joke['text']);?></td>
                <td><?php echo html($joke['author']); ?></td>
                <td><?php echo html($joke['category']); ?></td>
                <td class="jokeDate"><?php echo html($joke['date']); ?></td>
                <td class="jokeDate"><?php echo html($joke['updateDate']); ?></td>
                <input type="hidden" name="id" value="<?php echo $joke['id']; ?>" id="name">
            </tr>
        </form>
    <?php endforeach; ?>
    </tbody>
</table>
<p class="homeButton"><a href="..">Return to home</a></p>
</body>
</html>