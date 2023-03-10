<?php

namespace App\Services\StandardResponse;

use App\Services\StandardResponse\Contracts\StandardResponseServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Enumerable;
use Symfony\Component\HttpFoundation\Response;
use ArrayAccess;

/**
 * Standard Response Service
 */
class StandardResponseService extends StandardResponseServiceContract
{
    /**
     *
     * @inheritDoc
     *
     */
    public function success(
        string                            $message,
        ArrayAccess|Enumerable|array|null $data = null,
        int                               $http_status = Response::HTTP_OK,
    ): JsonResponse
    {
        return $this->response(
            true,
            $message,
            $http_status,
            $data,
        );
    }

    /**
     *
     * @inheritDoc
     *
     */
    public function failed(
        string                            $message,
        ArrayAccess|Enumerable|array|null $errors = null,
        int                               $http_status = Response::HTTP_BAD_REQUEST,
    ): JsonResponse
    {
        return $this->response(
            false,
            $message,
            $http_status,
            errors: $errors,
        );
    }

}
