<?php

namespace App\Helpers;

class ApiResponse
{
    public function apiResponse($responseCode, $responseMessage,  $responseSystemMessage, $responseData, $responseStatusCode)
    {
        $responseStructure = [
            'responseCode' => $responseCode,
            'responseMessage' => $responseMessage ?? '',
            'responseSystemMessage' => $responseSystemMessage ?? '',
            'responseData' => $responseData,
        ];

        return response()->json($responseStructure , $responseStatusCode);
    }

    public static function instance()
    {
        return new ApiResponse();
    }
}
