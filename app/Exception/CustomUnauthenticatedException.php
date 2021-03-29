<?php


namespace App\Exception;


use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomUnauthenticatedException extends HttpException
{
    public function __construct(string $message = "Unauthenticated")
    {
        parent::__construct(403, $message);
    }
}
