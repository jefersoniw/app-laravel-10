<?php

namespace App\Repositories;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Models\Support;
use Exception;
use stdClass;

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
    $support = $this->support->find($id);
    if (!$support) {
      return null;
    }

    return (object) $support->toArray();
  }

  public function delete(string $id)
  {
    $this->support->findOrFail($id)->delete();
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

    $support->subject = $dto->subject;
    $support->status = $dto->status;
    $support->body = $dto->body;
    if (!$support->save()) {
      throw new Exception("erro ao atualizar support");
    }

    return (object) $support->toArray();
  }
}
