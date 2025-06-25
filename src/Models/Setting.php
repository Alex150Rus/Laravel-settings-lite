<?php

namespace Amedvedev\LaravelSettingsLite\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property mixed $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['key', 'value'];

    public $timestamps = true;

    protected $casts = [
        'value' => 'json',
    ];
}