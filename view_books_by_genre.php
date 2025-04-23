<?php
include "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $genre_id = $_POST['genre_id'];

  if (!empty($genre_id)) {
    $sql = "SELECT book.title, book.publication_year
    FROM book
    JOIN book_genre ON book.book_id = book_genre.book_id
    WHERE book_genre.genre_id = $genre_id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)> 0){
      echo "<h2>Books in Genre</h2>";
      while ($row = mysqli_fetch_assoc($result)){
        echo "<p>Title: <span>" . $row['title'] . "</span>, Year: <span>" . $row['publication_year'] . "</span></p>";
      }
    } else{
      echo "<h2>No books found.</h2>";
    }
  }
}

mysqli_close($conn);