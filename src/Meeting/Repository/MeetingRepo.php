<?php

declare(strict_types=1);

namespace Meeting\Repository;

use Meeting\Collection\MeetingCollection;
use Meeting\Entity\Attendee;
use Meeting\Entity\Communities;
use Meeting\Entity\Organizer;
use Meeting\Entity\User;
use Meeting\Exception\InvalidDatavaseException;

final class MeetingRepo
{
  /**
   * @var PDO
   */
  private $pdo;

  public function __construct(PDO $pdo)
  {
      $this->pdo = $pdo;
  }

  public function fetchAll() : FilmCollection
  {
      $result = $this->pdo->query('SELECT id, title FROM films');
      $films = [];
      while ($film = $result->fetch()) {
          $films[] = new Film($meeting['title']);
      }
      return new MeetingCollection(...$meeting);
  }

  public function get(string $name) : Film
  {
      $statement = $this->pdo->prepare('SELECT id, title FROM films WHERE title = :name');
      $statement->execute([':name' => $name]);
      $film = $statement->fetch();
      if (!$film) {
          throw new InvalidDatavaseException();
      }
      return new Film($film['title']);
  }
}

?>
