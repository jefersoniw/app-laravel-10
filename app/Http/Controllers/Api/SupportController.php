<?php

namespace App\Http\Controllers\Api;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupportStoreRequest;
use App\Http\Resources\SupportResource;
use App\Services\SupportService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $totalPerPage = $request->per_page ?? 2;

        $supports = $this
            ->service
            ->paginate(
                $page,
                $totalPerPage,
                $request->filter
            );

        $filter = ['filter' => $request->filter ?? ''];

        return SupportResource::collection($supports->items())->additional([
            'meta' => [
                'total' => $supports->total(),
                'is_first_page' => $supports->isFirstPage(),
                'is_last_page' => $supports->isLastPage(),
                'current_page' => $supports->currentPage(),
                'next_page' => $supports->getNumberNextPage(),
                'previus_page' => $supports->getNumberPreviusPage()
            ]
        ]);

        // dd($supports, $filter);
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
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupportStoreRequest $request, string $id)
    {
        try {
            $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request, $id));

            if (!$support) {
                return \response()->json([
                    'error' => 'Not Found'
                ], Response::HTTP_NOT_FOUND);
            }

            return new SupportResource($support);
        } catch (Exception $erro) {
            return \response()->json([
                'erro' => $erro->getMessage(),
                'line' => $erro->getLine(),
                'file' => $erro->getFile(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return \response()->json([], Response::HTTP_NO_CONTENT);
    }
}
