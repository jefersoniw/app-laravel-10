<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{

  protected $repository;

  public function __construct(SupportRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function paginate(
    int $page = 1,
    int $totalPerPage = 15,
    string $filter = null
  ) {
    return $this->repository->paginate($page, $totalPerPage, $filter);
  }

  public function getAll(string $filter = null)
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

  public function delete(string $id)
  {
    $this->repository->delete($id);
  }
}
