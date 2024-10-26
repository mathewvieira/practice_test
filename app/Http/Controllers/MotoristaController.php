<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotoristaRequest;
use App\Interfaces\MotoristaRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MotoristaController extends Controller
{
    use ApiResponseTrait;

    private MotoristaRepositoryInterface $motoristaRepository;

    public function __construct(MotoristaRepositoryInterface $motoristaRepository)
    {
        $this->motoristaRepository = $motoristaRepository;
    }

    public function index(Request $request)
    {
        $perPage = (int) $request->query('perPage', 5);

        return $this->successResponse(
            'Motoristas retrieved.',
            $this->motoristaRepository->getAllPaginated($perPage)->toArray(request()),
            Response::HTTP_OK,
            true
        );
    }

    public function show(string $id)
    {
        $data = $this->motoristaRepository->findById($id)->toArray();
        return $this->successResponse(
            'Motorista found.',
            $data
        );
    }

    public function store(MotoristaRequest $request)
    {
        $data = $this->motoristaRepository->create($request->validated())->toArray();
        return $this->successResponse(
            'Motorista(s) created.',
            $data,
            Response::HTTP_CREATED
        );
    }

    public function update(MotoristaRequest $request, string $id)
    {
        $data = $this->motoristaRepository->update($id, $request->validated())->toArray();
        return $this->successResponse(
            'Motorista(s) updated.',
            $data
        );
    }

    public function destroy(string $id)
    {
        $this->motoristaRepository->delete($id);
        return $this->successResponse(
            'Motorista deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }

    public function destroyAll(Request $request)
    {
        $hasConfirmation = (bool) $request->query('hasConfirmation', false);

        $this->motoristaRepository->deleteAll($hasConfirmation);
        return $this->successResponse(
            'Motoristas deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
