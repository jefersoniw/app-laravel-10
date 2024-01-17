<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportStoreRequest;
use App\Models\Support;
use Exception;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    private $support;

    public function __construct(Support $support)
    {
        $this->support = $support;
    }

    public function index()
    {
        $supports = $this->support->all();

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
            $this->support->createSupport($request->validated());

            return \redirect()->route('supports.index');
        } catch (Exception $erro) {

            return [
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ];
        }
    }

    public function show(Support $support)
    {
        return view('admin.supports.show', [
            'support' => $support
        ]);
    }

    public function update(Request $request, Support $support)
    {
        try {
            $this->support->editSupport($support, $request->all());

            return \redirect()->route('supports.index');
        } catch (Exception $erro) {
            return [
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ];
        }
    }
}
