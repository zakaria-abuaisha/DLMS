<?php

namespace App\Exceptions;

use App\Traits\ApiResponses;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

// This class is responsible for handling errors when they occur in the controllers, like validation, notfound, and authorization errors.
class Handler extends ExceptionHandler
{
    use ApiResponses;

    protected $handlers = [
        ValidationException::class => 'handleValidation',
        NotFoundHttpException::class => 'handleNotFound',
        AuthenticationException::class => 'handleAuthentication',
    ];


    private function handleValidation(ValidationException $exception)
    {
        foreach ($exception->errors() as $key => $value)
            foreach ($value as $message)
            {
                $errors[] = [
                    'status' => 422,
                    'message' => $message,
                    'source' => $key
                ];
            }

        return $errors;
    }

    private function handleNotFound()
    {
         return [
             [
                 'status' => 404,
                 'message' => 'The Resource Cannot Be Found',
             ]
         ];
    }

    private function handleAuthentication()
    {
         return [
             [
                 'status' => 401,
                 'message' => 'You are NOT Authenticated',
             ]
         ];
    }

    public function render($request, Throwable $exception)
    {
        $className = get_class($exception);

        if(array_key_exists($className, $this->handlers))
        {
            $method = $this->handlers[$className];
            return $this->error($this->$method($exception));
        }

        $index = strrpos($className, '\\');

        return $this->error([
            [
                'type' => substr($className, $index + 1),
                'status' => 0,
                'message' => $exception->getMessage(),
                'source' => 'Line: ' . $exception->getLine() . ': ' . $exception->getFile(),
            ]
        ]);
    }
}

