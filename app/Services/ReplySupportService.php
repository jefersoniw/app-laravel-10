<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use Exception;

class ReplySupportService
{

  public function __construct()
  {
  }

  public function getAllBySupportId(string $supportId)
  {
    return [];
  }

  public function createNew(CreateReplyDTO $dto)
  {
    throw new Exception("not implemented");
  }
}
