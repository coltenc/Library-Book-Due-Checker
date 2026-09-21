<?php
//Colten Cline
//Check functions.php for instructions.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>
<body>
 <div class="container">
    <form action="index.php" method = "get">
        <h3>Library Checker</h3>
        <br><br>

        <label>First & last name: </label>
        <input type = "text" name = "name" required>
        <br><br>

        <label>Book/books: </label>
        <input type = "text" name = "booksToCheck">
        <br><br>

    <input type = "submit">
    <br><br>

    <hr>
    </form>
</div>

</body>
</html>