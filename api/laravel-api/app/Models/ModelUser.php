<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ModelUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ModelUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelUser query()
 * @mixin \Eloquent
 */
class ModelUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
    ];
}
