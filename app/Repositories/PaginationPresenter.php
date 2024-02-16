<?php

namespace App\Repositories;

use App\Repositories\Contracts\PaginationInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{
  protected $paginator;
  private array $items;

  public function __construct(LengthAwarePaginator $paginator)
  {
    $this->paginator = $paginator;
    $this->items = $this->convertItems($this->paginator->items());
  }

  public function items()
  {
    return $this->items;
  }

  public function total()
  {
    return $this->paginator->total() ?? 0;
  }

  public function isFirstPage()
  {
    return $this->paginator->onFirstPage();
  }

  public function isLastPage()
  {
    return $this->paginator->currentPage() === $this->paginator->lastPage();
  }

  public function currentPage()
  {
    return $this->paginator->currentPage() ?? 1;
  }

  public function getNumberNextPage()
  {
    return $this->paginator->currentPage() + 1;
  }

  public function getNumberPreviusPage()
  {
    return $this->paginator->currentPage() - 1;
  }

  private function convertItems(array $items)
  {
    $response = [];
    foreach ($items as $item) {

      $stdClassObject = new stdClass;

      foreach ($item->toArray() as $k => $value) {
        $stdClassObject->{$k} = $value;
      }

      \array_push($response, $stdClassObject);
    }

    return $response;
  }
}
