<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use PDOException;
use Log;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof PDOException) {
            $errorMessage = 'Something went wrong while connecting database. Please contact your server administrator.';
            Log::critical('[crystal-community-management][' . $e->getMessage() . "] db connection problem.");
            flash()->error($errorMessage);
            return redirect()->back();
        }
        if ($e instanceof InvalidArgumentException) {
            $errorMessage = 'Something went wrong while processing input data [' . $e->getMessage() . ']. Please contact your developer.';
            Log::info('[crystal-community-management][' . $e->getMessage() . "] input date format argument error.");
            flash()->error($errorMessage);
            return redirect()->back();
        }
        return parent::render($request, $e);
    }
}
