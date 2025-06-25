<?php

namespace Amedvedev\LaravelSettingsLite\Repository;

use Amedvedev\LaravelSettingsLite\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Amedvedev\LaravelSettingsLite\SettingsRepositoryInterface;

class SettingsRepository implements SettingsRepositoryInterface
{

    public function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("setting.{$key}", function () use ($key, $default) {
            $setting = Setting::query()->where('key', $key)->first();
            return $setting?->value ?? $default;
        });
    }

    public function all(): array
    {
        return Setting::query()->pluck('value', 'key')->toArray();
    }

    public function set(string $key, mixed $value): void
    {
        Setting::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        Cache::forget("setting.{$key}");
    }

    public function delete(string $key): void
    {
        Setting::query()->where('key', $key)->delete();
        Cache::forget("setting.{$key}");
    }
}