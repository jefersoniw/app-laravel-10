<?php

namespace App\Repositories;

interface PaginationInterface
{

  public function items();
  public function total();
  public function isFirstPage();
  public function isLastPage();
  public function currentPage();
  public function getNumberNextPage();
  public function getNumberPreviusPage();
}
