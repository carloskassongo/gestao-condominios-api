<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moradia extends Model
{
    use HasFactory;

    protected $table = 'moradias';

    protected $primaryKey = 'idMoradia';

    protected $fillable = [
        'descricao',
        'idBloco'
    ];

    public function bloco()
    {
        return $this->belongsTo(Bloco::class, 'idBloco');
    }

    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class, 'pessoa_moradia', 'idMoradia', 'idPessoa');
    }

    public function cobrancas()
    {
        return $this->hasMany(Cobranca::class, 'idMoradia');
    }
}
