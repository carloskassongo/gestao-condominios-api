<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';

    protected $primaryKey = 'idPessoa';

    protected $fillable = [
        'idCondominio',
        'tipo',
        'nome'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function moradias()
    {
        return $this->belongsToMany(Moradia::class, 'pessoa_moradia', 'idPessoa', 'idMoradia');
    }

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class, 'idPessoa');
    }

    public function pessoaJuridica()
    {
        return $this->hasOne(PessoaJuridica::class, 'idPessoa');
    }
}
