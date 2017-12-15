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

  public function fetchAll() : MeetingCollection
  {
      $result = $this->pdo->query('SELECT id, title FROM meeting');
      $meeting = [];
      while ($meeting = $result->fetch()) {
          $meetings[] = new Meeting($meeting['title']);
      }
      return new MeetingCollection(...$meeting);
  }

  public function get(string $name) : Meeting
  {
      $statement = $this->pdo->prepare('SELECT id, title FROM meetings WHERE title = :name');
      $statement->execute([':name' => $name]);
      $meeting = $statement->fetch();
      if (!$meeting) {
          throw new InvalidDatavaseException();
      }
      return new Meeting($meeting['title']);
  }
}

?>
