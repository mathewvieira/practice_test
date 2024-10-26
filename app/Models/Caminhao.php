<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caminhao extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'caminhoes';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'placa',
        'modelo_id',
        'motorista_id'
    ];

    /**
     * Get the motorista that owns the caminhao.
     */
    public function motorista(): BelongsTo
    {
        return $this->belongsTo(Motorista::class);
    }

    /**
     * Get the modelo associated with the caminhao.
     */
    public function modelo(): BelongsTo
    {
        return $this->belongsTo(Modelo::class);
    }
}
