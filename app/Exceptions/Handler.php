<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
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
        if ($e instanceof NotFoundHttpException) {
            return response()->json(['error' => 'Resource not found'], 404);
        }

        if ($e instanceof ValidationException) {
            return response()->json(['error' => 'Validation error', 'errorMsg' => $e->validator->errors()], 422);
        }

        if ($e instanceof AuthenticationException) {
            return response()->json(['error' => 'Authentication error', 'errorMsg' => $e->getMessage()], 401);
        }

        if ($e instanceof AuthorizationException) {
            return response()->json(['error' => 'Unauthorized', 'errorMsg' => $e->getMessage()], 403);
        }

        return response()->json([
            'error' => 'An error occurred',
            'errorMsg' => $e->getMessage()
        ], 500);
    }
}
