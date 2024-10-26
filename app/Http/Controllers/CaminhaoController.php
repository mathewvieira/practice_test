<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaminhaoRequest;
use App\Interfaces\CaminhaoRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaminhaoController extends Controller
{
    use ApiResponseTrait;

    private CaminhaoRepositoryInterface $caminhaoRepository;

    public function __construct(CaminhaoRepositoryInterface $caminhaoRepository)
    {
        $this->caminhaoRepository = $caminhaoRepository;
    }

    public function index(Request $request)
    {
        $perPage = (int) $request->query('perPage', 5);

        return $this->successResponse(
            'Caminhoes retrieved.',
            $this->caminhaoRepository->getAllPaginated($perPage)->toArray(request()),
            Response::HTTP_OK,
            true
        );
    }

    public function show(string $id)
    {
        $data = $this->caminhaoRepository->findById($id)->toArray();
        return $this->successResponse(
            'Caminhao found.',
            $data
        );
    }

    public function store(CaminhaoRequest $request)
    {
        $data = $this->caminhaoRepository->create($request->validated())->toArray();
        return $this->successResponse(
            'Caminhao(oes) created.',
            $data,
            Response::HTTP_CREATED
        );
    }

    public function update(CaminhaoRequest $request, string $id)
    {
        $data = $this->caminhaoRepository->update($id, $request->validated())->toArray();
        return $this->successResponse(
            'Caminhao(oes) updated.',
            $data
        );
    }

    public function destroy(string $id)
    {
        $this->caminhaoRepository->delete($id);
        return $this->successResponse(
            'Caminhao deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }

    public function destroyAll(Request $request)
    {
        $hasConfirmation = (bool) $request->query('hasConfirmation', false);

        $this->caminhaoRepository->deleteAll($hasConfirmation);
        return $this->successResponse(
            'Caminhoes deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
