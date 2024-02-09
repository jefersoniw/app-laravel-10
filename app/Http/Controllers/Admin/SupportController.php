<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
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
        $page = $request->page ?? 1;
        $totalPerPage = $request->per_page ?? 5;

        $supports = $this->service->paginate($page, $totalPerPage, $request->filter);

        $filter = ['filter' => $request->filter ?? ''];

        return view('admin.supports.index', [
            'supports' => $supports,
            'filter' =>  $filter,
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

            return \redirect()
                ->route('supports.index')
                ->with('messages', 'Tópico cadastrado com sucesso!');
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
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', [
            'support' => $support
        ]);
    }

    public function update(SupportStoreRequest $request, $id)
    {
        try {
            $this->service->update(UpdateSupportDTO::makeFromRequest($request, $id));

            return \redirect()
                ->route('supports.index')
                ->with('messages', 'Tópico atualizado com sucesso!');
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

        return \redirect()
            ->route('supports.index')
            ->with('delete', 'Tópico apagado com sucesso!');
    }
}
