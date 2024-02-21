<?php

namespace App\DTO\Replies;

use App\Http\Requests\StoreReplySupport;
use Illuminate\Http\Request;

class CreateReplyDTO
{

  public function __construct(
    public string $supportId,
    public string $content,
  ) {
  }

  public static function makeFromRequest(StoreReplySupport $request): self
  {
    return new self(
      $request->support_id,
      $request->content,
    );
  }
}
