<?php

declare(strict_types=1);

namespace Meeting\Entity

final class Meeting
{
  /**
  * @var string
  **/

  public function __construct(string $title)
  {
    $this->title = $title;
  }

  public function title() : string
  {
    return $this->title;
  }


}

 ?>
