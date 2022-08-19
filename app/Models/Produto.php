<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'nome',
        'preco'
    ];

    public function venda()
    {
        return $this->hasMany(Venda::class);
    }

    public static function findToNome($nome)
    {
        return self::where('nome', 'LIKE', "%$nome%")->first();
    }
}
