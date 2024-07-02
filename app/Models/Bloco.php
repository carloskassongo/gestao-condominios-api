<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    use HasFactory;

    protected $table = 'blocos';

    protected $primaryKey = 'idBloco';

    protected $fillable = [
        'sigla',
        'descricao',
        'idCondominio'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function moradias()
    {
        return $this->hasMany(Moradia::class, 'idBloco');
    }
}
