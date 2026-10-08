//coltencline
<?php 
include_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Library</title>
</head>
<body>

    <form method="get" action='index.php' id="theform">
        <label>Return Date: </label>
        <input type="date" name="returnDate"><br>

        <label>Due Date: </label>
        <input type="date" name="dueDate"><br>

        <input type="submit">
    </form>

    <div id="theform">
        <label><?php echo $results; ?></label>
    </div>

</body>
</html>