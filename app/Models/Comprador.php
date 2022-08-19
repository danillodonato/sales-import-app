<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    use HasFactory;

    protected $table = "compradores";

    public $timestamps = false;

    public $fillable = [
        'nome'
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
