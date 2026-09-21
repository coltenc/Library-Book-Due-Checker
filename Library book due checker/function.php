<?php
//Colten Cline
//In order to check the return and duedates or books you will first have to find the customer.
//once you have the customer you can find a book or all books that the customer has checked out.
//To find ALL books the customer has checked out you will leaved the book/books input empty.
//To find a specific book the customer has you will put the specific book in the book/books input slot.
?>

<?php include 'form.php'; ?>
<?php
    //List of customers and there books so u can retrive the data
    function CustomerList(){
        return [
        "Hayden Gilbert" => [
            ["Title" => "Game of thrones", "dueDate" => "2026-05-23", "returnDate" => "2026-05-00"],
            ["Title" => "Hungar games", "dueDate" => "2026-10-31", "returnDate" => null],
            ["Title" => "Black clover", "dueDate" => "2026-04-19", "returnDate" => "2026-04-19"]
        ],

        "Ryan Martin" => [
            ["Title" => "I survive", "dueDate" => "2026-09-20", "returnDate" => "2026-09-20"],
            ["Title" => "Diary of a wimpy kid", "dueDate" => "2026-09-14", "returnDate" => null]
        ],

        "Colten Cline" => [
            ["Title" => "Solo leveling", "dueDate" => "2025-06-07", "returnDate" => "2025-05-07"],
            ["Title" => "That time I got reincarnated as a slime", "dueDate" => "2024-01-16", "returnDate" => "2024-02-22"]
        ]
    ];
    }

    //checks to see if the person is in the array and if they are it will retreive the book or books they want to check dates on
    function checkData(){
        if (isset($_GET['name']) && isset($_GET['booksToCheck'])){
            //grabs the name of customer and the book they want to look up. turns the customer list into a string to check details.
            $customName = $_GET['name'] ?? '';
            $checkBook = $_GET['booksToCheck'] ?? '';
            $customerList = CustomerList();

            echo("Customer: " . $customName);

            //checks to see if the customer exists.
            if(array_key_exists($customName, $customerList)){
                $customerBooks = $customerList[$customName];
                $bookTitles = array_column($customerList[$customName], 'Title');

                //checks to see if the customer has the book checked out
                if(in_array($checkBook, $bookTitles)){
                    checkSpecificBook($customerBooks, $checkBook);
                } else if($checkBook == ""){
                    checkAllBooks($customerBooks);
                } else{
                    echo($checkBook . " Not found!");
                }

            } else{
                echo("Customer not found.");
            }
        }
    }

    //checks all books that the customer has checked out.
    function checkAllBooks($books){
        echo '<div class="container" style="margin-top: 20px;">';
        echo("<h3>Checked out</h3>");

        //cycles through all of the books that the customer has so it can then be displayed.
        foreach ($books as $book) {
            echo "Title: " . $book['Title'] . "<br>";
            timeChecker($book['dueDate'], $book['returnDate']);
        }
        echo("</div>");
    }

   //checks the specific book that was put in. 
    function checkSpecificBook($books, $bookTitle){
        echo '<div class="container" style="margin-top: 20px;">';
        echo("<h3>Checked out</h3>");

        //cycles through customers books to grab the specific book and the books information
        foreach ($books as $book) {
            if ($book['Title'] === $bookTitle) {
                echo "Title: " . $book['Title'] . "<br>";
                timeChecker($book['dueDate'], $book['returnDate']);
                break;
            }
        }

        echo("</div>");
    }

    //grabs the return and due date to put to website later.
    function timeChecker($dueDateTime, $returnDateTime){

    echo("<div>");

    //returns the return and due date to website.
    echo "Due Date: " . $dueDateTime . "<br>";
    echo "Return Date: " . ($returnDateTime ?? 'Not returned yet') . "<br>";

    $dueDate = date_create($dueDateTime);

   //checks to see if return and due date are the same.
    if ($returnDateTime !== null && $returnDateTime !== '') {
        $returnDate = date_create($returnDateTime);
        $diff = date_diff($dueDate, $returnDate);
        $formatted = $diff->format("%y years, %m months, and %d days");

        //checks to see how many days you have to return the book.
        if ($returnDate > $dueDate) {
            echo "Overdue by: " . $formatted . "<br><br>";
        } else if ($returnDate < $dueDate) {
            echo "Returned early by: " . $formatted . "<br><br>";
        } else {
            echo "Returned on due date.<br><br>";
        }
    } else {
        //creates today as a time
        $today = date_create('today');
        
        //subtracts the duedate by today so it can check to see how far the book is over due.
        if ($today > $dueDate) {
            $diff = date_diff($dueDate, $today);
            echo "Overdue by: " . $diff->format("%y years, %m months, and %d days") . "<br><br>";
        } else {
            $diff = date_diff($today, $dueDate);
            echo "Return your book by: " . $diff->format("%y years, %m months, and %d days") . "<br><br>";
        }

        echo("</div>");
    }
    }

?>