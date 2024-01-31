<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupportStoreRequest;
use App\Models\Support;
use App\Services\SupportService;
use Exception;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    private $service;

    public function __construct(SupportService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);

        return view('admin.supports.index', [
            'supports' => $supports
        ]);
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(SupportStoreRequest $request)
    {
        try {
            $this->service->new(CreateSupportDTO::makeFromRequest($request));

            return \redirect()->route('supports.index');
        } catch (Exception $erro) {

            return [
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ];
        }
    }

    public function show($id)
    {
        if (!$support = $this->service->findOone($id)) {
            return back();
        }

        return view('admin.supports.show', [
            'support' => $support
        ]);
    }

    public function update(SupportStoreRequest $request, $id)
    {
        try {
            $this->service->update(UpdateSupportDTO::makeFromRequest($request));

            return \redirect()->route('supports.index');
        } catch (Exception $erro) {
            return [
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ];
        }
    }

    public function delete($id)
    {
        $this->service->delete($id);

        return \redirect()->route('supports.index');
    }
}
