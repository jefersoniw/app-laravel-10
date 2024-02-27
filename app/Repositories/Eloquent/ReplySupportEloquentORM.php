<?php

namespace App\Repositories\Eloquent;

use App\DTO\Replies\CreateReplyDTO;
use App\Models\ReplySupport;
use App\Repositories\Contracts\ReplyRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use stdClass;

class ReplySupportEloquentORM implements ReplyRepositoryInterface
{
  public function __construct(protected ReplySupport $replySupport)
  {
    //
  }

  public function getAllBySupportId(string $supportId): array
  {

    $replies = $this
      ->replySupport
      ->with('user', 'support')
      ->where('support_id', $supportId)
      ->get();

    return $replies->toArray();
  }

  public function createNew(CreateReplyDTO $dto): stdClass
  {
    $this->replySupport->support_id = $dto->supportId;
    $this->replySupport->content = $dto->content;
    $this->replySupport->user_id = Auth::user()->id;
    if (!$this->replySupport->save()) {
      throw new Exception("erro ao salvar nova resposta");
    }

    $reply = $this->replySupport->with('user', 'support')->orderByDesc('id')->first();

    return (object) $reply->toArray();
  }

  public function delete(string $id): bool
  {
    if (!$reply = $this->replySupport->find($id)) {
      return false;
    }

    if (Gate::denies('owner', $reply->user->id)) {
      \abort('403', 'Not Authorized!');
    }

    return (bool) $reply->delete();
  }
}
