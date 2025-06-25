<?php
namespace Amedvedev\LaravelSettingsLite;

interface SettingsRepositoryInterface
{
    public function get(string $key, mixed $default = null): mixed;
    public function all(): array;
    public function set(string $key, mixed $value): void;
    public function delete(string $key): void;
}