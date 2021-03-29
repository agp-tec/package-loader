<?php

namespace App\Exception;

use Agp\Log\Log;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
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
     * @param Throwable $exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws Exception
     */
    public function report(Throwable $exception)
    {
        Log::handleException($exception);

        if ($this->isHttpException($exception)) {
            $errorcode = $exception->getStatusCode();
            switch ($errorcode) {
                case 419:
                case 404:
                case 500:
                case 503:
                    break; //Faz nada. Páginas personalizadas vão segurar a exception
                default: //TODO não está executando isso
                    return response()->view('errors.500', [], $errorcode); //Erro desconhecido
            }
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request  $request
     * @param Throwable $exception
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->isJson()){
            if ($exception instanceof ModelNotFoundException){
                return response()->json([
                    'message' => 'Nenhum resultado para o modelo ['.$exception->getModel()."] ".join(',', $exception->getIds())], 404);
            }
        }

        return parent::render($request, $exception);
    }
}
