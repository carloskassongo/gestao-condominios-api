<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $table = 'contas';

    protected $primaryKey = 'idConta';

    protected $fillable = [
        'idCondominio',
        'descricao'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function movimentos()
    {
        return $this->hasMany(Movimento::class, 'idConta');
    }

    public function transferenciasOrigem()
    {
        return $this->hasMany(Transferencia::class, 'idContaOrigem');
    }

    public function transferenciasDestino()
    {
        return $this->hasMany(Transferencia::class, 'idContaDestino');
    }

    public function lancamentos()
    {
        return $this->hasMany(Lancamento::class, 'idConta');
    }
}
