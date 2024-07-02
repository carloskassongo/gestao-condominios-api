<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $table = 'transferencias';

    protected $primaryKey = 'idTransferencia';

    protected $fillable = [
        'idContaOrigem',
        'idContaDestino',
        'idCondominio',
        'valor'
    ];

    public function contaOrigem()
    {
        return $this->belongsTo(Conta::class, 'idContaOrigem');
    }

    public function contaDestino()
    {
        return $this->belongsTo(Conta::class, 'idContaDestino');
    }

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }
}
