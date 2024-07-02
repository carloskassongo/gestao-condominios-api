<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    use HasFactory;

    protected $table = 'contasbancarias';

    protected $primaryKey = 'idContaBancaria';

    protected $fillable = [
        'idCondominio',
        'descricao',
        'agencia',
        'conta',
        'banco'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function movimentos()
    {
        return $this->hasMany(Movimento::class, 'idContaBancaria');
    }
}
