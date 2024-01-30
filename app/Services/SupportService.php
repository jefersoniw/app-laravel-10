<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

class SupportService
{

  protected $repository;

  public function __construct()
  {
  }

  public function getAll(string $filter = null): array
  {
    return $this->repository->getAll($filter);
  }

  public function findOone(string $id)
  {
    return $this->repository->findOne($id);
  }

  public function new(CreateSupportDTO $dto)
  {

    return $this->repository->new($dto);
  }

  public function update(UpdateSupportDTO $dto)
  {

    return $this->repository->update($dto);
  }

  public function delete(string $id): void
  {
    $this->repository->delete();
  }
}
