<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponser{


    /**
     * @param string|array $data
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK){

        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse(string $message, int $code){

        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * @param string $message
     * @param int $code
     * @return response
     */
    public function errorMessage(string $message, int $code){

        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
