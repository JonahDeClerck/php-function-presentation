<?php

$output = htmlspecialchars(
    $_POST['input'],
    ENT_QUOTES,
    'UTF-8',
    TRUE
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>htmlspecialchars-example</title>
</head>
<body>

    <form Method="post">
        <label for="input">Input:</label>
        <input type="field" name="input">
    </form>

    <a><?=htmlentities($output)?></a>

</body>
</html>