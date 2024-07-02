<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $table = 'movimentos';

    protected $primaryKey = 'idMovimento';

    protected $fillable = [
        'idConta',
        'idContaBancaria',
        'idCondominio',
        'idCategoria',
        'idSubcategoria',
        'idPeriodo',
        'dataMovimento',
        'valor',
        'descricao'
    ];

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'idConta');
    }

    public function contaBancaria()
    {
        return $this->belongsTo(ContaBancaria::class, 'idContaBancaria');
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
