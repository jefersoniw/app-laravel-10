<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SupportService;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{

    protected $service;

    public function __construct(SupportService $service)
    {
        $this->service = $service;
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
