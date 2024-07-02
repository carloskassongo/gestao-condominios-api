<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    use HasFactory;

    protected $table = 'cobrancas';

    protected $primaryKey = 'idCobranca';

    protected $fillable = [
        'idMoradia',
        'idPeriodo',
        'valor',
        'paga'
    ];

    public function moradia()
    {
        return $this->belongsTo(Moradia::class, 'idMoradia');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'idPeriodo');
    }
}
