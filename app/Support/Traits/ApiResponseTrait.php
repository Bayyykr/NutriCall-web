<?php

declare(strict_types=1);

namespace App\Support\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponseTrait
{
    /**
     * Return a standardized success JSON response.
     *
     * @param  array<string, mixed>  $meta
     */
    protected function successResponse(
        mixed $data = null,
        string $message = 'Success',
        int $statusCode = Response::HTTP_OK,
        array $meta = []
    ): JsonResponse {
        $response = [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ];

        if (! empty($meta)) {
            $response['meta'] = $meta;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Return a 201 Created JSON response.
     */
    protected function createdResponse(
        mixed $data = null,
        string $message = 'Resource created successfully'
    ): JsonResponse {
        return $this->successResponse($data, $message, Response::HTTP_CREATED);
    }

    /**
     * Return a standardized error JSON response.
     */
    protected function errorResponse(
        string $message = 'An error occurred',
        int $statusCode = Response::HTTP_BAD_REQUEST,
        mixed $errors = null
    ): JsonResponse {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if ($errors !== null) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Return a 404 Not Found JSON response.
     */
    protected function notFoundResponse(string $message = 'Resource not found'): JsonResponse
    {
        return $this->errorResponse($message, Response::HTTP_NOT_FOUND);
    }

    /**
     * Return a 401 Unauthorized JSON response.
     */
    protected function unauthorizedResponse(string $message = 'Unauthenticated'): JsonResponse
    {
        return $this->errorResponse($message, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Return a 403 Forbidden JSON response.
     */
    protected function forbiddenResponse(string $message = 'Forbidden'): JsonResponse
    {
        return $this->errorResponse($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * Return a paginated JSON response.
     */
    protected function paginatedResponse(
        LengthAwarePaginator $paginator,
        string $message = 'Data retrieved successfully',
        mixed $data = null
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data ?? $paginator->items(),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ],
        ], Response::HTTP_OK);
    }
}
