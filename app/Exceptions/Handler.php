<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

// clases de errores importados
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Queryexception;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class Handler extends ExceptionHandler
{
    use  ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
     * @param  \Throwable  $exception
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
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
         // error al hacer un post, es decir, si los datos estan vacios
         if($exception instanceof ValidationException){
            return $this->errorvalidationpost($exception,$request);
        }
          // error modelo no encontrado es decir al hacer un get, no existe el dato solicitado
         if ($exception Instanceof ModelNotFoundException) {
              $modelo = strtolower(class_basename($exception->getModel()));
              return $this->errorResponse("no existe ninguna instancia de {$modelo} especificado" , 404);
         } 
         if ($exception Instanceof AuthenticationException) {
            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->unauthenticated($request, $exception);
         } 
         if ($exception Instanceof AuthorizationException) {
            
            return $this->errorResponse('No posee permisos para ejecutar esta accion',403);
         }    
         // error al no encontrar una ruta especifica al hacer una peticion
         if ($exception Instanceof NotFoundHttpException) {
            return $this->errorResponse('No se encontro la URl especificada',404);
         }
            // error al  enviar desde el cliente un metodo que no le pertenece a dicha ruta. entonces mostramos este emensaje
         if ($exception Instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse('El metodo especificado en la peticion no es valido',405);
         }
         // otros errores http.. menos importantes,
         if ($exception Instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(),$exception->getStatusCode());
         }
           // error para controlar errores de integridad con la base de datso ->QueryException
         if ($exception Instanceof  QueryException) {
             $codigo= $exception->errorInfo[1];
             if ($codigo==1451) {
                return $this->errorResponse('No se puede Eliminar de forma permanente el recurso por que esta relacionado con algun otro',409);
             }
           
         }
         // errores inesperados del servidor , por ejemplo la base de datos podria estar caido
         if (config('app.debug')) {
            return parent::render($request, $exception);
         }
         return $this->errorResponse('Falla inesperada,Intente luego',500);
    }

}
