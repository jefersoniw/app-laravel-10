<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ReplySupportService;
use App\Services\SupportService;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{

    protected $service;
    protected $replyService;

    public function __construct(
        SupportService $service,
        ReplySupportService $replyService
    ) {
        $this->service = $service;
        $this->replyService = $replyService;
    }

    public function index($id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.replies.replies', [
            'support' => $support
        ]);
    }
}
