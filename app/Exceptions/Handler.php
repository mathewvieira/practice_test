<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            return $this->handleApiException($exception);
        }

        return parent::render($request, $exception);
    }

    protected function handleApiException(Throwable $exception)
    {
        \Log::error($exception);

        $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        $errorMessage = 'An unexpected error occurred.';

        if ($exception instanceof ModelNotFoundException) {
            $statusCode = Response::HTTP_NOT_FOUND;
            $errorMessage = 'Resource not found.';
        }

        if ($exception instanceof QueryException) {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            $errorMessage = 'Database error.';
        }

        if ($exception instanceof ValidationException) {
            $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
            $errorMessage = 'Validation error occurred.';
        }

        if ($exception instanceof NotFoundHttpException) {
            $statusCode = Response::HTTP_NOT_FOUND;
            $errorMessage = 'The requested resource could not be found.';
        }

        return response()->json(
            [
                'error' => $errorMessage,
                'message' => $exception->getMessage(),
            ],
            $statusCode
        );
    }
}
