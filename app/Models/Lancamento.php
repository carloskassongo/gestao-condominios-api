<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    use HasFactory;

    protected $table = 'lancamentos';

    protected $primaryKey = 'idLancamento';

    protected $fillable = [
        'idConta',
        'idCondominio',
        'idCategoria',
        'idSubcategoria',
        'idPeriodo',
        'dataLancamento',
        'valor',
        'descricao'
    ];

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'idConta');
    }

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
