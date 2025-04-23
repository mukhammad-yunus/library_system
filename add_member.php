<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD' == 'POST']) {
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $email = trim($_POST['email']);
  $join_date = trim($_POST['join_date']);

  if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($join_date)) {
    $sql = "INSERT INTO member (first_name, last_name, email, join_date) VALUES ('$first_name', '$last_name', '$email', '$join_date')";

    if (mysqli_query($conn, $sql)) {
      echo "Member added successfully";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
}