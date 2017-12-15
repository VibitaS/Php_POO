<?php

declare(strict_types=1);

namespace Meeting\Entity

final class Attendee
{
  /**
  * @var string
  **/

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function name() : string
  {
    return $this->name;
  }


}

 ?>
