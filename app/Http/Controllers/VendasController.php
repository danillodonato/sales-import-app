<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendasController extends Controller
{
    public function index()
    {
        $vendas = Venda::paginate(10);

        $total = Venda::getTotal();

        return view("sales.list", ["vendas" => $vendas, "total" => $total]);
    }

    public function store(Request $request)
    {
        $storageData = [];

        $files = $request->file('saleFiles');

        foreach ($files as $key => $file) {
            $path = $file->store('vendas');

            $content = Storage::get($path);

            $storageData = $this->stringToArray($content);

            if(!$storageData) return redirect()->route('import')->with('msg', 'Ocorreu um erro na importação das vendas. Um dos arquivos não está no formato correto.');

            Storage::deleteDirectory('vendas');
        }

        foreach ($storageData as $data)
        {
            $comprador = Comprador::findToNome($data[0]);
            
            if (!$comprador) $comprador = Comprador::create(["nome" => $data[0]]);

            $fornecedor = Fornecedor::findToNome($data[5]);
            
            if (!$fornecedor) $fornecedor = Fornecedor::create(["nome" => $data[5], "endereco" => $data[4]]);
    
            $produto = Produto::findToNome($data[1]);
            
            if (!$produto) $produto = Produto::create(["nome" => $data[1], "preco" => $data[2]]);
    
            $vendaData = [ "comprador_id" => $comprador->id,
                            "fornecedor_id" => $fornecedor->id,
                            "produto_id" => $produto->id,
                            "quantidade" => $data[3]
                        ];
    
            $venda = Venda::create($vendaData);
        }

        return redirect()->route('sales')->with('msg', 'Vendas importadas com sucesso!');;
    }

    private function stringToArray($content)
    {
        $arrayData = [];

        $rows = explode("\r\n", $content);
        
        array_shift($rows);

        foreach ($rows as $value)
        {
            $row = explode("\t", $value);

            if(!$this->validateData($row)) return false;

            array_push($arrayData, $row);
        }
        
        return $arrayData;
    }

    private function validateData($data)
    {
        if (count($data) != 6) return false;

        return true;
    }
}
