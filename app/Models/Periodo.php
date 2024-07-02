<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';

    protected $primaryKey = 'idPeriodo';

    protected $fillable = [
        'dataInicio',
        'dataFim',
        'orcamentoFechado',
        'idCondominio'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class, 'idPeriodo');
    }

    public function cobrancas()
    {
        return $this->hasMany(Cobranca::class, 'idPeriodo');
    }

    public function movimentos()
    {
        return $this->hasMany(Movimento::class, 'idPeriodo');
    }

    public function lancamentos()
    {
        return $this->hasMany(Lancamento::class, 'idPeriodo');
    }
}
