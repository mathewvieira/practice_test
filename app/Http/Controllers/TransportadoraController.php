<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportadoraRequest;
use App\Interfaces\TransportadoraRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransportadoraController extends Controller
{
    use ApiResponseTrait;

    private TransportadoraRepositoryInterface $transportadoraRepository;

    public function __construct(TransportadoraRepositoryInterface $transportadoraRepository)
    {
        $this->transportadoraRepository = $transportadoraRepository;
    }

    public function index(Request $request)
    {
        $perPage = (int) $request->query('perPage', 5);

        return $this->successResponse(
            'Transportadoras retrieved.',
            $this->transportadoraRepository->getAllPaginated($perPage)->toArray(request()),
            Response::HTTP_OK,
            true
        );
    }

    public function show(string $id)
    {
        $data = $this->transportadoraRepository->findById($id)->toArray();
        return $this->successResponse(
            'Transportadora found.',
            $data
        );
    }

    public function store(TransportadoraRequest $request)
    {
        $data = $this->transportadoraRepository->create($request->validated())->toArray();
        return $this->successResponse(
            'Transportadora(s) created.',
            $data,
            Response::HTTP_CREATED
        );
    }

    public function update(TransportadoraRequest $request, string $id)
    {
        $data = $this->transportadoraRepository->update($id, $request->validated())->toArray();
        return $this->successResponse(
            'Transportadora(s) updated.',
            $data
        );
    }

    public function destroy(string $id)
    {
        $this->transportadoraRepository->delete($id);
        return $this->successResponse(
            'Transportadora deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }

    public function destroyAll(Request $request)
    {
        $hasConfirmation = (bool) $request->query('hasConfirmation', false);

        $this->transportadoraRepository->deleteAll($hasConfirmation);
        return $this->successResponse(
            'Transportadoras deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
