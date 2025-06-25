<?php
namespace Amedvedev\LaravelSettingsLite;

class SettingsManager
{

    public function __construct(
        private readonly SettingsRepositoryInterface $settingsRepository,
    )
    {
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->settingsRepository->get($key, $default);
    }

    public function set(string $key, mixed $value): void
    {
        $this->settingsRepository->set($key, $value);
    }

    public function all(): array
    {
        return $this->settingsRepository->all();
    }
}