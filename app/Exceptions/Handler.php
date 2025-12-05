<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // protected function getDefaultMessage(int $status): string
    // {
    //     return match ($status) {
    //         403 => 'Akses ditolak.',
    //         404 => 'Halaman tidak ditemukan.',
    //         419 => 'Sesi kadaluarsa.',
    //         500 => 'Kesalahan server.',
    //         default => 'Terjadi kesalahan yang tidak diketahui.'
    //     };
    // }

    // public function render($request, Throwable $exception)
    // {
    //     $status = $exception instanceof HttpExceptionInterface
    //         ? $exception->getStatusCode()
    //         : 500;

    //     $message = $exception->getMessage() ?: $this->getDefaultMessage($status);

    //     return response()->view('errors.error', [
    //         'code' => $status,
    //         'message' => $message
    //     ], $status);
    // }

}
