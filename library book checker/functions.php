<?php
    include_once 'form.php';

    //grabs inputs
    $returnDate = $_GET['returnDate'] ?? null;
    $dueDate =$_GET['dueDate'] ?? null;

    function timeCalculator($returnDate, $dueDate){
        //checks to see if input has been entered
        if(!$returnDate || !$dueDate){
            return "Please provide both dates";
        }

        //turns the inputs into date strings so they can be calculated.
        $rDate = date_create($returnDate);
        $dDate = date_create($dueDate);

        //checks to see if u returned your book before or after the due date.
        if($rDate > $dDate){
            //returned after due date
            $diff = date_diff($rDate, $dDate);
            return $diff->format('%y years, %m months, %d days late');

        } else if($rDate < $dDate){
            //returns before due date
            $diff = date_diff($dDate, $rDate);
            return $diff->format('%y years, %m months, %d days early');

        } else if($rDate == $dDate){
            //returned the same day
            return "Returned on due date!";
        }
    }