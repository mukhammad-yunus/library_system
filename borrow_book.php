<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD']=='POST'){
  $book_id = $_POST['book_id'];
  $member_id = $_POST['member_id'];
  $librarian_id = $_POST['librarian_id'];
  $borrow_date = $_POST['borrow_date'];
  $due_date = $_POST['due_date'];

  if (!empty($book_id) && !empty($member_id) && !empty($librarian_id) && !empty($borrow_date) && !empty($due_date)){
    $sql = "INSERT INTO Loan (book_id, member_id, librarian_id, borrow_date, due_date) VALUES ($book_id, $member_id, $librarian_id, '$borrow_date', '$due_date')";

    if(mysqli_query($conn, $sql)){
      echo "Book borrowed successfully";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
}

mysqli_close($conn);