<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeloRequest;
use App\Interfaces\ModeloRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModeloController extends Controller
{
    use ApiResponseTrait;

    private ModeloRepositoryInterface $modeloRepository;

    public function __construct(ModeloRepositoryInterface $modeloRepository)
    {
        $this->modeloRepository = $modeloRepository;
    }

    public function index(Request $request)
    {
        $perPage = (int) $request->query('perPage', default: 5);

        return $this->successResponse(
            'Modelos retrieved.',
            $this->modeloRepository->getAllPaginated($perPage)->toArray(request()),
            Response::HTTP_OK,
            true
        );
    }

    public function show(string $id)
    {
        $data = $this->modeloRepository->findById($id)->toArray();
        return $this->successResponse(
            'Modelo found.',
            $data
        );
    }

    public function store(ModeloRequest $request)
    {
        $data = $this->modeloRepository->create($request->validated())->toArray();
        return $this->successResponse(
            'Modelo(s) created.',
            $data,
            Response::HTTP_CREATED
        );
    }

    public function update(ModeloRequest $request, string $id)
    {
        $data = $this->modeloRepository->update($id, $request->validated())->toArray();
        return $this->successResponse(
            'Modelo(s) updated.',
            $data
        );
    }

    public function destroy(string $id)
    {
        $this->modeloRepository->delete($id);
        return $this->successResponse(
            'Modelo deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }

    public function destroyAll(Request $request)
    {
        $hasConfirmation = (bool) $request->query('hasConfirmation', false);

        $this->modeloRepository->deleteAll($hasConfirmation);
        return $this->successResponse(
            'Modelos deleted.',
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
