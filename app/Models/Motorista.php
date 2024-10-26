<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorista extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $casts = [
        'cpf' => 'integer',
    ];

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email'
    ];

    /**
     * Get the transportadoras that owns the motorista.
     */
    public function transportadoras(): BelongsToMany
    {
        return $this->belongsToMany(Transportadora::class, 'motorista_transportadora');
    }

    /**
     * Get the caminhoes associated with the motorista.
     */
    public function caminhoes(): HasMany
    {
        return $this->hasMany(Caminhao::class);
    }
}
