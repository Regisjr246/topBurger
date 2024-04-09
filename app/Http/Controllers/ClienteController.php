<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\CadastroCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{


    public function cadastroCliente( )
    {
        $cliente = CadastroCliente::all();
        $clienteComImagem = $cliente->map(function ($cliente) {
            return [
                'nome' => $cliente->nome,
                'telefone' => $cliente->telefone,
                'email' => $cliente->email,
                'cpf' => $cliente->cpf,
                'endereco' => $cliente->endereco,
                'password' => Hash::make($cliente->password),
                'imagem' => asset('storage/' . $cliente->imagem)

            ];
        });

        return response()->json($clienteComImagem);
    }

    public function storeCliente(ClienteRequest $request)
    {

        $produtoData = $request->all();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/produtos', $nomeImagem, 'public');
            $produtoData['imagem'] = $caminhoImagem;
        }
        $produto = CadastroCliente::create($produtoData);
        return response()->json(['produto' => $produto], 201);
    }
}
