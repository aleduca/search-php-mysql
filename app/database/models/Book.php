<?php

namespace app\database\models;

use PDO;

class Book
{
  public function getBooks(PDO $connection)
  {
    try {
      $prepare = $connection->prepare("select id, title, description from books limit 50");
      $prepare->execute();
      return $prepare->fetchAll();
    } catch (\Throwable $th) {
      var_dump($th->getMessage());
    }
  }

  public function searchBooks(PDO $connection, $search)
  {
    try {
      $prepare = $connection->prepare("select id, title, description from books where title like :search");
      $prepare->execute(['search' => '%' . $search . '%']);
      return $prepare->fetchAll();
    } catch (\Throwable $th) {
      var_dump($th->getMessage());
    }
  }
}
