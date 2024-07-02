<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    use HasFactory;

    protected $table = 'condominios';

    protected $primaryKey = 'idCondominio';

    protected $fillable = [
        'razaoSocial',
        'cnpj',
        'ie',
        'im',
        'email',
        'telefone',
        'celular',
        'endereco',
        'numeroEnd',
        'complementoEnd',
        'bairro',
        'cidade',
        'estado',
        'cep'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idCondominio');
    }

    public function blocos()
    {
        return $this->hasMany(Bloco::class, 'idCondominio');
    }

    public function periodos()
    {
        return $this->hasMany(Periodo::class, 'idCondominio');
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'idCondominio');
    }

    public function contas()
    {
        return $this->hasMany(Conta::class, 'idCondominio');
    }

    public function contasBancarias()
    {
        return $this->hasMany(ContaBancaria::class, 'idCondominio');
    }

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class, 'idCondominio');
    }
}
