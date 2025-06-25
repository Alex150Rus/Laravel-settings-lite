<?php
namespace Amedvedev\LaravelSettingsLite;

use Amedvedev\LaravelSettingsLite\Console\InstallCommand;
use Amedvedev\LaravelSettingsLite\Repository\SettingsRepository;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}