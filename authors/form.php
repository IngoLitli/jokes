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
        <label for="name">Name:
            <input type="text" name="name" id="name" value="<?php echo html($name);?>" pattern="[A-Z][A-z|0-9| ]*" required>
        </label>
        <label for="email">Email:
            <input type="email" name="email" id="email" value="<?php echo html($email);?>" pattern="[A-z|0-9]*[@][A-z|0-9]*[.][a-z]*" required>
        </label>
    </div>
    <div>
        <input type="hidden" name="id" class="valReq" value="<?php echo html($id)?>">
        <input type="submit" value="<?php echo html($button);?>">
    </div>
</form>
</body>
</html>
