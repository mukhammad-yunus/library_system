<?php
include "db_connect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $loan_id = $_POST['loan_id'];
  $return_date = $_POST['return_date'];

  if(!empty($loan_id) && !empty($return_date)){
    $sql = "INSERT INTO return_book (loan_id, return_date) VALUES ($loan_id, '$return_date')";

    if(mysqli_query($conn, $sql)){
      echo "Book returned successfully!";
    } else{
      echo "Error: " . mysqli_error($conn);
    }
  }
}

mysqli_close($conn);