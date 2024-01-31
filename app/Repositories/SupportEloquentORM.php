<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{

  public function getAll(string $filter = null): array
  {
  }

  public function findOne(string $id)
  {
  }
  public function delete(string $id): void
  {
  }
  public function new(CreateSupportDTO $dto): stdClass
  {
  }
  public function update(UpdateSupportDTO $dto)
  {
  }
}
