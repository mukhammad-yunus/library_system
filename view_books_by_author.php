<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $author_id = $_POST['author_id'];

  $sql = "SELECT book.title, book.publication_year
  FROM book
  JOIN book_author ON book.book_id = book_author.book_id
  WHERE book_author.author_id = $author_id
  ";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)> 0){
    echo "<h2>Books by Author</h2>";
    while ($row = mysqli_fetch_assoc($result)){
      echo "<p>Title: <span>" . $row['title'] . "</span>, Year: <span>" . $row['publication_year'] . "</span></p>";
    }
  } else{
    echo "<h2>No books found.</h2>";
  }
}

mysqli_close($conn);