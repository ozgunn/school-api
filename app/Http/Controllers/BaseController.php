<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{
    public string $userIdentifier;

    public function __construct()
    {
        $this->userIdentifier = config('app.user_identifier');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message = null)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 401)
    {
        $response = [
            'success' => false,
            'error' => $error,
            'errorMsg' => $errorMessages,
            'data' => []
        ];

        return response()->json($response, $code);
    }

    public function getUser()
    {
        return auth()->user();
    }
}
