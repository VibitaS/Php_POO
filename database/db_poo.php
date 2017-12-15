<?php

declare(strict_types=1);

namespace Database;

/**
 *
 */
class Db_poo
{
  private $dp_pdo;
  final function db_connect()
  {
    $db_pdo = new PDO('mysql:host=database; dbname=demo;charset=utf8', 'demo', 'demo');

    try {
      if ($_SERVER['database'] == ('database'))
      {
        $db_pdo = new PDO('mysql:host=database; dbname=demo;charset=utf8', 'demo', 'demo');
      }
      else
      {
        $db_pdo = new PDO('mysql:host=database; dbname=demo', 'demo', 'demo');
        $db_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db_pdo->setAttribute(PDO::FETCH_ASSOC);
        $db_pdo->setAttribute(PDO::fetchAll);
        $this->db_pdo = $db_pdo;
      }
    } catch (Exception $e) {
      // En cas d'erreur, afficher :
      die('Erreur : '.$e->getMessage());
    }
  }
}

?>
