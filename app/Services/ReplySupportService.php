<?php

namespace App\Services;

use App\DTO\Replies\CreateReplyDTO;
use App\Events\SupportRepliedEvent;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use stdClass;

class ReplySupportService
{

  public function __construct(
    protected ReplyRepositoryInterface $repository
  ) {
  }

  public function getAllBySupportId(string $supportId): array
  {
    return $this->repository->getAllBySupportId($supportId);
  }

  public function createNew(CreateReplyDTO $dto): stdClass
  {
    $reply = $this->repository->createNew($dto);

    SupportRepliedEvent::dispatch($reply);

    return $reply;
  }

  public function delete(string $id): bool
  {
    return $this->repository->delete($id);
  }
}
