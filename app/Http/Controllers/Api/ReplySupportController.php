<?php

namespace App\Http\Controllers\Api;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplySupportResource;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Exception;
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

    public function store(StoreReplySupport $request)
    {
        try {
            $reply = $this->replyService->createNew(CreateReplyDTO::makeFromRequest($request));

            return (new ReplySupportResource($reply))->response()->setStatusCode(Response::HTTP_CREATED);
        } catch (Exception $erro) {

            return response()->json([
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
