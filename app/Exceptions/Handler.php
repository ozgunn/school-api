<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        $response = [
            'success' => false,
            'error' => __('An error occurred'),
            'errorMsg' => $e->getMessage()
        ];
        $code = 500;

        if ($e instanceof NotFoundHttpException) {
            $response['error'] = __('Resource not found');
            $response['errorMsg'] = $e->getMessage();
            $code = 404;
        }

        if ($e instanceof ValidationException) {
            $response['error'] = __('Validation error');
            $response['errorMsg'] = $e->validator->errors();
            Log::channel("db")->error('validation error', array_merge(['user' => auth()->id()], $e->validator->errors()->messages()));
            $code = 422;
        }

        if ($e instanceof NotAcceptableHttpException) {
            $response['error'] = __('Not allowed');
            $response['errorMsg'] = $e->getMessage();
            $code = 406;
        }

        if ($e instanceof AuthenticationException) {
            return response()->json(['error' => 'Authentication error', 'errorMsg' => $e->getMessage()], 401);
        }

        if ($e instanceof AuthorizationException) {
            return response()->json(['error' => 'Unauthorized', 'errorMsg' => $e->getMessage()], 403);
        }

        if ($e instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Not found', 'errorMsg' => $e->getMessage()], 404);
        }

        return response()->json($response, $code);
    }
}
