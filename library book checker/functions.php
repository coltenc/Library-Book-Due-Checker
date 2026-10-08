<?php

$returnDate = $_GET['returnDate'] ?? null;
$dueDate = $_GET['dueDate'] ?? null;

function timeCalculator($returnDate, $dueDate){
    if (!$returnDate || !$dueDate) {
        return "Please provide both dates.";
    }

    $rDate = date_create($returnDate);
    $dDate = date_create($dueDate);

    if ($rDate > $dDate) {
        $diff = date_diff($dDate, $rDate);
        return "Overdue by: " . $diff->format('%a days');
    } else if ($rDate < $dDate) {
        $diff = date_diff($rDate, $dDate);
        return "Returned early with " . $diff->format('%a days') . " to spare!";
    } else {
        return "Your book was returned on the exact due date!";
    }
}

$results = timeCalculator($returnDate, $dueDate);


?>