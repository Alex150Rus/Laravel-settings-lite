<?php

namespace Amedvedev\LaravelSettingsLite\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'settings:install';
    protected $description = 'Install the settings package by copying the migration file';

    public function handle(): void
    {
        $timestamp = date('Y_m_d_His');
        $source = dirname(__DIR__, 2) . '/database/migrations/create_settings_table.php';
        $destination = database_path("migrations/{$timestamp}_create_settings_table.php");

        if (!File::exists($destination)) {
            File::copy($source, $destination);
            $this->info("Migration copied to: {$destination}");
        } else {
            $this->warn("Migration file already exists: {$destination}");
        }
    }
}