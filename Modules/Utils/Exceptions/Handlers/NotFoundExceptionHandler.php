<?php

namespace Modules\Utils\Exceptions\Handlers;

use Throwable;
use Modules\Utils\Exceptions\NotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class NotFoundExceptionHandler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

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
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {

            $models = explode('\\', $exception->getModel());
            $entityName = array_pop($models);
            $id = implode(',', $exception->getIds());

            throw new NotFoundException($id, $entityName);
        }

        return parent::render($request, $exception);
    }
}
