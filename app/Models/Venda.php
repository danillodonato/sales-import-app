<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    public $fillable = [
        'comprador_id',
        'fornecedor_id',
        'produto_id',
        'quantidade'
    ];

    public function comprador()
    {
        return $this->belongsTo(Comprador::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public static function getTotal()
    {
        return self::join('produtos', 'produtos.id', '=', 'vendas.produto_id')
                    ->selectRaw('sum(vendas.quantidade * produtos.preco) as total')
                    ->first()->total;
    }
}
