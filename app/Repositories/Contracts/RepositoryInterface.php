<?php

namespace App\Repositories\Contracts;

use App\DTO\Replies\CreateReplyDTO;

interface RepositoryInterface
{

  public function getAllBySupportId(string $supportId);
  public function createNew(CreateReplyDTO $dto);
}
