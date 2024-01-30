<?php

namespace App\DTO;

use App\Http\Requests\SupportStoreRequest;

class CreateSupportDTO
{
  public function __construct(
    string $subject,
    string $status,
    string $body
  ) {
  }

  public static function makeFromRequest(SupportStoreRequest $request): self
  {
    return new self(
      $request->subject,
      'a',
      $request->body
    );
  }
}
