<?php

namespace App\Repositories;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\SupportStatus;
use App\Models\Support;
use App\Repositories\Contracts\SupportRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SupportEloquentORM implements SupportRepositoryInterface
{
  protected $support;

  public function __construct(Support $support)
  {
    $this->support = $support;
  }

  public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null)
  {
    $result = $this->support
      ->with([
        'user',
        'replies' => function ($query) {
          $query->orderByDesc('id');
        }
      ])
      ->where(function ($query) use ($filter) {
        if ($filter) {
          $query->where('subject', $filter);
          $query->orWhere('body', 'like', "%{$filter}%");
        }
      })
      ->paginate($totalPerPage, ['*'], 'page', $page);

    return new PaginationPresenter($result);
  }

  public function getAll(string $filter = null)
  {
    return $this->support
      ->where(function ($query) use ($filter) {
        if ($filter) {
          $query->where('subject', $filter);
          $query->orWhere('body', 'like', "%{$filter}%");
        }
      })
      ->get()
      ->toArray();
  }

  public function findOne(string $id)
  {
    $support = $this->support->with('user', 'replies')->find($id);
    if (!$support) {
      return null;
    }

    return (object) $support->toArray();
  }

  public function delete(string $id)
  {
    $support = $this->support->findOrFail($id);

    if (Gate::denies('owner', $support->user->id)) {
      \abort('403', 'Not Authorized!');
    }

    $support->delete();
  }

  public function new(CreateSupportDTO $dto)
  {
    $this->support->subject = $dto->subject;
    $this->support->status = $dto->status;
    $this->support->body = $dto->body;
    if (!$this->support->save()) {
      throw new Exception("erro ao salvar support");
    }

    return (object) $this->support->toArray();
  }

  public function update(UpdateSupportDTO $dto)
  {
    if (!$support = $this->support->find($dto->id)) {
      return null;
    }

    if (Gate::denies('owner', $support->user->id)) {
      \abort('403', 'Not Authorized!');
    }

    $support->subject = $dto->subject;
    $support->status = $dto->status;
    $support->body = $dto->body;
    if (!$support->save()) {
      throw new Exception("erro ao atualizar support");
    }

    return (object) $support->toArray();
  }

  public function updateStatus(string $id, SupportStatus $status): void
  {
    $support = $this->support->where('id', $id)->first();
    $support->status = $status;
    if (!$support->save()) {
      throw new Exception("erro ao atualizar status!");
    }
  }
}
