<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimentacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimentacaoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all()->toArray();

        usort($produtos, function ($a, $b) {
            return strcasecmp($a['nome'], $b['nome']);
        });

        return view('movimentacoes.index', compact('produtos'));
    }

    public function create()
    {
        $produtos = Produto::orderBy('nome')->get();

        return view('movimentacoes.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo' => 'required|in:Entrada,Saída',
            'quantidade' => 'required|integer|min:1',
            'data_movimentacao' => 'required|date',
        ], [
            'produto_id.required' => 'Selecione um produto.',
            'produto_id.exists' => 'Produto inválido.',
            'tipo.required' => 'Selecione o tipo de movimentação.',
            'tipo.in' => 'Tipo de movimentação inválido.',
            'quantidade.required' => 'Informe a quantidade.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser maior que zero.',
            'data_movimentacao.required' => 'Informe a data.',
            'data_movimentacao.date' => 'Informe uma data válida.',
        ]);

        $produto = Produto::findOrFail($dados['produto_id']);

        if (
            $dados['tipo'] === 'Saída' &&
            $dados['quantidade'] > $produto->estoque
        ) {
            return back()
                ->withInput()
                ->with('erro', 'A quantidade de saída é maior que o estoque disponível.');
        }

        DB::transaction(function () use ($dados, $produto) {

            if ($dados['tipo'] === 'Entrada') {
                $produto->estoque += $dados['quantidade'];
            } else {
                $produto->estoque -= $dados['quantidade'];
            }

            $produto->save();

            Movimentacao::create([
                'produto_id' => $produto->id,
                'usuario_id' => auth()->user()->idusuario,
                'tipo' => $dados['tipo'],
                'quantidade' => $dados['quantidade'],
                'data_movimentacao' => $dados['data_movimentacao'],
            ]);
        });

        if (
            $dados['tipo'] === 'Saída' &&
            $produto->estoque < $produto->estoque_minimo
        ) {
            return redirect()
                ->route('movimentacoes.index')
                ->with(
                    'alerta',
                    'Atenção! O estoque de ' . $produto->nome .
                    ' ficou abaixo do estoque mínimo.'
                );
        }

        return redirect()
            ->route('movimentacoes.index')
            ->with('sucesso', 'Movimentação registrada com sucesso!');
    }
}