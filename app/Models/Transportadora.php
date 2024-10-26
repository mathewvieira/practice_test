<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportadora extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 1,
    ];

    protected $casts = [
        'cnpj' => 'integer',
        'status' => 'integer'
    ];

    protected $fillable = [
        'nome',
        'cnpj',
        'status'
    ];

    /**
     * Get the motoristas associated with the transportadora.
     */
    public function motoristas(): BelongsToMany
    {
        return $this->belongsToMany(Motorista::class, 'motorista_transportadora');
    }
}
