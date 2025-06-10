<?php

use App\Console\Commands\DeleteExpiredAnnouncement;
use App\Console\Commands\DeleteExpiredAnnouncements;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\TeacherCheck;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminCheck::class,
            'teacher' => TeacherCheck::class,
        ]);
    })->withSchedule(function (Schedule $schedule) {
        $schedule->command('announcements:delete-expired')->everySecond();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
