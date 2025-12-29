<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\config;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\TaskRepositoryInterface::class,
            function ($app) {
                $config = require __DIR__ . '/../Models/config.php';
                //$mode = session('repository_mode', config('app.repository_mode', 'mysql'));
                $mode = $config['repository'];
                
                return match ($mode) {
                    'file' => new \App\Repositories\FileTaskRepository(),
                    'mysql' => new \App\Repositories\MySqlTaskRepository(),
                    default => new \App\Repositories\InMemoryTaskRepository(),
                };
            }
        );
    }

    public function boot(): void
    {
        //
    }
}
