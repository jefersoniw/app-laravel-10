<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Replies\CreateReplyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Exception;
use Illuminate\Http\Request;

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
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        $replies = $this->replyService->getAllBySupportId($id);

        return view('admin.supports.replies.replies', [
            'support' => $support,
            'replies' => $replies,
        ]);
    }

    public function store(StoreReplySupport $request)
    {
        try {
            $this->replyService->createNew(CreateReplyDTO::makeFromRequest($request));

            return \redirect()
                ->route('replies.index', $request->support_id)
                ->with('messages', 'Resposta cadastrada com sucesso!');
        } catch (Exception $erro) {

            return [
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ];
        }
    }

    public function destroy(string $supportId, string $id)
    {
        $this->replyService->delete($id);

        return \redirect()
            ->route('replies.index', $supportId)
            ->with('delete', 'Resposta apagada com sucesso!');
    }
}
