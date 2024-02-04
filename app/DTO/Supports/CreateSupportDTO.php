<?php

namespace App\DTO\Supports;

use App\Http\Requests\SupportStoreRequest;

class CreateSupportDTO
{
  public function __construct(
    public string $subject,
    public string $status,
    public string $body
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
