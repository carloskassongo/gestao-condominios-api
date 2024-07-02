<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $primaryKey = 'idCategoria';

    protected $fillable = [
        'descricao',
        'idCondominio'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class, 'idCategoria');
    }

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class, 'idCategoria');
    }

    public function movimentos()
    {
        return $this->hasMany(Movimento::class, 'idCategoria');
    }

    public function lancamentos()
    {
        return $this->hasMany(Lancamento::class, 'idCategoria');
    }
}
