<?php

namespace App\Repositories\Contracts;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\SupportStatus;

interface SupportRepositoryInterface
{
  public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null);
  public function getAll(string $filter = null);
  public function findOne(string $id);
  public function delete(string $id);
  public function new(CreateSupportDTO $dto);
  public function update(UpdateSupportDTO $dto);
  public function updateStatus(string $id, SupportStatus $status): void;
}
