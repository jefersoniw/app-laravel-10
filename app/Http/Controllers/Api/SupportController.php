<?php

namespace App\Http\Controllers\Api;

use App\DTO\Supports\CreateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupportStoreRequest;
use App\Http\Resources\SupportResource;
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupportStoreRequest $request)
    {
        try {
            $support = $this->service->new(CreateSupportDTO::makeFromRequest($request));

            return new SupportResource($support);
        } catch (Exception $erro) {

            return \response()->json([
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
