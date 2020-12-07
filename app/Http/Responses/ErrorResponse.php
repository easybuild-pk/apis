<?php

namespace App\Http\Responses;

use Illuminate\Http\Response;

class ErrorResponse extends Response
{
    public static function toResponse($message, $data = [])
    {
        $response = array_merge(['message' => $message], $data);
        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }
}
