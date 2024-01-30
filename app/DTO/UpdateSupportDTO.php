<?php

namespace App\DTO;

use App\Http\Requests\SupportStoreRequest;

class UpdateSupportDTO
{

  public function __construct(
    string $id,
    string $subject,
    string $status,
    string $body
  ) {
  }

  public static function makeFromRequest(SupportStoreRequest $request): self
  {
    return new self(
      $request->id,
      $request->subject,
      'a',
      $request->body
    );
  }
}
