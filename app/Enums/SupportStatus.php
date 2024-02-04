<?php

namespace App\Enums;

use Exception;
use ValueError;

enum SupportStatus: string
{

  case A = "Open";
  case P = "Pendent";
  case C = "Closed";

  public static function fromValue(string $valueStatus)
  {
    foreach (self::cases() as $status) {
      if ($valueStatus === $status->name) {
        return $status->value;
      }
    }

    throw new ValueError("$status is not valid!");
  }
}
