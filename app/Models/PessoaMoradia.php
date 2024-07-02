<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaMoradia extends Model
{
    use HasFactory;

    protected $table = 'pessoa_moradia';

    protected $fillable = [
        'idPessoa',
        'idMoradia'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }

    public function moradia()
    {
        return $this->belongsTo(Moradia::class, 'idMoradia');
    }
}
