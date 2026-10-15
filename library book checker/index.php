<?php
    include_once 'functions.php';

    $results = timeCalculator(
        $_GET['returnDate'] ?? null,
        $_GET['dueDate'] ?? null
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Library checker</title>
</head>
<body>
    <?php include_once 'form.php'; ?>

    <div id="output">
        <?php 
        echo($results); 
        ?>
    </div>
</body>
</html>