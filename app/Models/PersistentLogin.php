<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersistentLogin extends Model
{
    use HasFactory;

    protected $table = 'persistent_logins';

    protected $primaryKey = 'series';

    public $incrementing = false;

    protected $fillable = [
        'series',
        'username',
        'token',
        'last_used'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'username', 'username');
    }
}
