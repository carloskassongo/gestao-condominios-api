<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';

    protected $primaryKey = 'idSubcategoria';

    protected $fillable = [
        'descricao',
        'idCategoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class, 'idSubcategoria');
    }

    public function movimentos()
    {
        return $this->hasMany(Movimento::class, 'idSubcategoria');
    }

    public function lancamentos()
    {
        return $this->hasMany(Lancamento::class, 'idSubcategoria');
    }
}
