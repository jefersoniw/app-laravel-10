<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
  protected $support;

  public function __construct(Support $support)
  {
    $this->support = $support;
  }

  public function getAll(string $filter = null): array
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

  public function delete(string $id): void
  {
    $this->support->findOrFail($id)->delete();
  }

  public function new(CreateSupportDTO $dto): stdClass
  {
    $support = $this->support->createSupport((array) $dto);

    return (object) $support->toArray();
  }

  public function update(UpdateSupportDTO $dto)
  {
    if (!$support = $this->support->find($dto->id)) {
      return null;
    }

    $edit = $this->support->editSupport($support, (array) $dto);

    return (object) $edit->toArray();
  }
}
