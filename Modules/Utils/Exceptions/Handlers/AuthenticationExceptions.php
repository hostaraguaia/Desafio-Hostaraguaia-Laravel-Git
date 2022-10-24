<?php

namespace Modules\Utils\Exceptions\Handlers;

use Modules\Utils\ApiReturn\ApiReturn;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class AuthenticationExceptions extends ExceptionHandler
{
    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthenticationException) {
            return ApiReturn::ErrorMessage('Usuario não autenticado', 401);
        }
        return parent::render($request, $exception);
    }
}
