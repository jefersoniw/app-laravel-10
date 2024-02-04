<?php

use App\Enums\SupportStatus;

if (!function_exists('getStatusSupport')) {
  function getStatusSupport(string $status)
  {
    return SupportStatus::fromValue($status);
  }
}
