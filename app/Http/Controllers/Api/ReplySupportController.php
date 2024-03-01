<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplySupportResource;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplySupportController extends Controller
{
    public function __construct(
        protected SupportService $service,
        protected ReplySupportService $replyService,
    ) {
        //
    }

    public function index($id)
    {
        if (!$this->service->findOne($id)) {
            return \response()->json([
                'message' => 'not found!'
            ], Response::HTTP_NOT_FOUND);
        }

        $replies = $this->replyService->getAllBySupportId($id);

        return ReplySupportResource::collection($replies);
    }
}
