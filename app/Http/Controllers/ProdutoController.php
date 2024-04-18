<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function ListagemProduto()                                       
    {
        $produtos = Produto::all();
        $produtosComImagem = $produtos->map(function ($produto) {
            return [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'ingredientes' => $produto->ingredientes,
                'valor' => $produto->preco,
                'imagem' => asset('storage/' .  $produto->imagem),
            ];
        });
        return response()->json($produtosComImagem);
    }
    public function CadastroProduto(ProdutoRequest $request)
    {
        $produtoData = $request->all();
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/produtos', $nomeImagem, 'public');
            $produtoData['imagem'] = $caminhoImagem;
        }
        $produto = Produto::create($produtoData);
        return response()->json(['produto' => $produto], 201);
    }
}
