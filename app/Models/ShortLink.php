<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property float $id
 * @property string $code
 * @property string $long_url
 * @property string $created_at
 * @property string $updated_at
 */
class ShortLink extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'float';

    /**
     * @var array
     */
    protected $fillable = ['code', 'long_url', 'created_at', 'updated_at'];
}
