<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;

    protected $table = 'pessoasjuridicas';

    protected $primaryKey = 'idPessoa';

    public $incrementing = false;

    protected $fillable = [
        'cnpj',
        'ie',
        'im'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa');
    }
}
