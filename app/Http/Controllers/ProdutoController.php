<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        $produtos = Produto::query();

        if ($busca) {
            $produtos->where(function ($query) use ($busca) {
                $query->where('nome', 'like', '%' . $busca . '%')
                    ->orWhere('marca', 'like', '%' . $busca . '%')
                    ->orWhere('modelo', 'like', '%' . $busca . '%');
            });
        }

        $produtos = $produtos->orderBy('nome')->get();

        return view('produtos.index', compact('produtos', 'busca'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:45',
            'marca' => 'required|string|max:45',
            'modelo' => 'required|string|max:45',
            'material' => 'required|string|max:45',
            'tamanho' => 'required|string|max:45',
            'peso' => 'required|numeric|min:0',
            'tensao' => 'required|string|max:45',
            'estoque' => 'required|integer|min:0',
            'estoque_minimo' => 'required|integer|min:0',
        ], [
            'required' => 'Preencha todos os campos.',
            'numeric' => 'O peso deve ser um número válido.',
            'integer' => 'O estoque deve ser um número inteiro.',
            'min' => 'O valor não pode ser negativo.',
        ]);

        $dados['usuario_idusuario'] = auth()->user()->idusuario;

        Produto::create($dados);

        return redirect()
            ->route('produtos.index')
            ->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:45',
            'marca' => 'required|string|max:45',
            'modelo' => 'required|string|max:45',
            'material' => 'required|string|max:45',
            'tamanho' => 'required|string|max:45',
            'peso' => 'required|numeric|min:0',
            'tensao' => 'required|string|max:45',
            'estoque_minimo' => 'required|integer|min:0',
        ], [
            'required' => 'Preencha todos os campos.',
            'numeric' => 'O peso deve ser um número válido.',
            'integer' => 'O estoque mínimo deve ser um número inteiro.',
            'min' => 'O valor não pode ser negativo.',
        ]);

        $produto->update($dados);

        return redirect()
            ->route('produtos.index')
            ->with('sucesso', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('sucesso', 'Produto excluído com sucesso!');
    }
}