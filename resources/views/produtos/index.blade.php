<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Produtos</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f8;
            color: #1e293b;
        }

        .topo {
            background: #1e293b;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .conteudo {
            max-width: 1200px;
            margin: auto;
            padding: 40px;
        }

        .acoes {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        .botao {
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .voltar {
            background: #64748b;
        }

        .excluir {
            background: #dc2626;
        }

        .editar {
            background: #f59e0b;
        }

        .busca {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .busca input {
            width: 70%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 13px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #1e293b;
            color: white;
        }

        .mensagem {
            padding: 15px;
            background: #dcfce7;
            color: #166534;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alerta {
            padding: 15px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .acoes-tabela {
            display: flex;
            gap: 6px;
        }
    </style>
</head>

<body>

<header class="topo">

    <h1>Cadastro de Produtos</h1>

    <span>
        Olá, {{ Auth::user()->name }}
    </span>

</header>

<main class="conteudo">

    <div class="acoes">

        <a href="{{ route('dashboard') }}" class="botao voltar">
            Voltar
        </a>

        <a href="{{ route('produtos.create') }}" class="botao">
            Novo Produto
        </a>

    </div>

    @if(session('sucesso'))
        <div class="mensagem">
            {{ session('sucesso') }}
        </div>
    @endif

    @if(session('erro'))
        <div class="alerta">
            {{ session('erro') }}
        </div>
    @endif

    <div class="busca">

        <form method="GET" action="{{ route('produtos.index') }}">

            <input
                type="text"
                name="busca"
                value="{{ $busca }}"
                placeholder="Digite nome, marca ou modelo..."
            >

            <button type="submit" class="botao">
                Buscar
            </button>

        </form>

    </div>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Material</th>
                <th>Tamanho</th>
                <th>Peso</th>
                <th>Tensão</th>
                <th>Estoque</th>
                <th>Mínimo</th>
                <th>Ações</th>
            </tr>

        </thead>

        <tbody>

            @forelse($produtos as $produto)

                <tr>

                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->marca }}</td>
                    <td>{{ $produto->modelo }}</td>
                    <td>{{ $produto->material }}</td>
                    <td>{{ $produto->tamanho }}</td>
                    <td>{{ $produto->peso }}</td>
                    <td>{{ $produto->tensao }}</td>
                    <td>{{ $produto->estoque }}</td>
                    <td>{{ $produto->estoque_minimo }}</td>

                    <td>

                        <div class="acoes-tabela">

                            <a
                                href="{{ route('produtos.edit', $produto->id) }}"
                                class="botao editar"
                            >
                                Editar
                            </a>

                            <form
                                method="POST"
                                action="{{ route('produtos.destroy', $produto->id) }}"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="botao excluir"
                                    onclick="return confirm('Deseja realmente excluir este produto?')"
                                >
                                    Excluir
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="11">
                        Nenhum produto encontrado.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</main>

</body>
</html>