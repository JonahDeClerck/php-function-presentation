<?php
function parseInput(array $array): string
{ 
    $string = htmlspecialchars(htmlspecialchars(
        $array['input'],
        ENT_QUOTES,
        'UTF-8',
        TRUE
    ));

    return $string;
}
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

    <form Method="post" action="parseInput($_POST['input'])">
        <label for="input">Input:</label>
        <input type="field" name="input">
    </form>

    <?php if(isset($_POST['input'])): ?>
        <a><?=$output?></a> 
    <?php endif ?>
</body>
</html>