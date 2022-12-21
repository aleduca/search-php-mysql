<?php

require '../vendor/autoload.php';

use app\database\Connection;
use app\database\models\Book;

$book = new Book;

if (isset($_GET['s'])) {
  $search = strip_tags($_GET['s']);
  $books = $book->searchBooks(Connection::getConnection(), $search);
} else {
  $books = $book->getBooks(Connection::getConnection());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search with php and mysql</title>
</head>

<body>
  <form method="get">
    <input type="text" placeholder="Search book" name="s">
    <button type="submit">Search</button>
  </form>

  <ul>
    <?php foreach ($books as $book) : ?>
      <li><?php echo $book->title; ?></li>
    <?php endforeach; ?>
  </ul>

</body>

</html>