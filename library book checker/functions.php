<?php

//grabs teh inputs
$returnDate = $_GET['returnDate'] ?? null;
$dueDate = $_GET['dueDate'] ?? null;

//checks to see if values have been submitted and calculated the difference
function timeCalculator($returnDate, $dueDate){
    //checks to see if there is anything in the inputs.
    if (!$returnDate || !$dueDate) {
        return "Please provide both dates.";
    }

    //changes the strings to be dates
    $rDate = date_create($returnDate);
    $dDate = date_create($dueDate);

    //checks to see if the due date is before or after the return date or if they are the same
    if ($rDate > $dDate) {
        //calculates the difference in the dates to them send them to the page
        $diff = date_diff($dDate, $rDate);
        return "Overdue by: " . $diff->format('%m month ') . $diff->format('%a days and ') . $diff->format('%y years');
    } else if ($rDate < $dDate) {
        $diff = date_diff($rDate, $dDate);
        return "Returned early with " . $diff->format('%m month ') . $diff->format('%a days and ') . $diff->format('%y years to spare!');
    } else {
        return "Your book was returned on the exact due date!";
    }
}
//veriable that is used to send the stuff to the webpage.
$results = timeCalculator($returnDate, $dueDate);


?>