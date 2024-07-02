<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    protected $table = 'orcamentos';

    protected $primaryKey = 'idOrcamento';

    protected $fillable = [
        'idCondominio',
        'idCategoria',
        'idSubcategoria',
        'idPeriodo',
        'valor'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'idSubcategoria');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'idPeriodo');
    }
}
