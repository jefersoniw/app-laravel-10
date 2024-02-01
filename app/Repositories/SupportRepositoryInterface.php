<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

interface SupportRepositoryInterface
{
  public function getAll(string $filter = null);
  public function findOne(string $id);
  public function delete(string $id);
  public function new(CreateSupportDTO $dto);
  public function update(UpdateSupportDTO $dto);
}
