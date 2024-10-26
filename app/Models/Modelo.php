<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelo extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nome',
        'cor'
    ];

    /**
     * Get the caminhoes that owns the modelo.
     */
    public function caminhoes(): HasMany
    {
        return $this->hasMany(Caminhao::class);
    }
}
