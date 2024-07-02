<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'username',
        'password',
        'ativo',
        'nome',
        'sobrenome',
        'email',
        'idCondominio'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'idCondominio');
    }

    public function autorizacoes()
    {
        return $this->hasMany(Autorizacao::class, 'id_usuario');
    }
}
