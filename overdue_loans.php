<?php
include "db_connect.php";

$sql = "SELECT Loan.loan_id, Book.title, Member.first_name, Member.last_name, Loan.due_date 
        FROM Loan 
        JOIN Book ON Loan.book_id = Book.book_id 
        JOIN Member ON Loan.member_id = Member.member_id 
        LEFT JOIN return_book ON Loan.loan_id = return_book.loan_id 
        WHERE return_book.return_id IS NULL AND Loan.due_date < CURDATE()";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Overdue Loans</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Loan ID: " . $row['loan_id'] . ", Book: " . $row['title'] . 
             ", Member: " . $row['first_name'] . " " . $row['last_name'] . 
             ", Due: " . $row['due_date'] . "<br>";
    }
} else {
    echo "No overdue loans.";
}

mysqli_close($conn);