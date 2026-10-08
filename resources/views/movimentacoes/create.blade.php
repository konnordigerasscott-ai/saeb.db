<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Movimentação</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
        }

        .campo {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .botoes {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .botao {
            padding: 11px 18px;
            border: none;
            border-radius: 6px;
            color: white;
            background: #2563eb;
            text-decoration: none;
            cursor: pointer;
        }

        .voltar {
            background: #555;
        }

        .erro {
            background: #f8d7da;
            color: #842029;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .erros {
            background: #f8d7da;
            color: #842029;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Nova Movimentação</h1>

    @if(session('erro'))
        <div class="erro">
            {{ session('erro') }}
        </div>
    @endif

    @if($errors->any())
        <div class="erros">
            @foreach($errors->all() as $erro)
                <div>{{ $erro }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('movimentacoes.store') }}" method="POST">

        @csrf

        <div class="campo">
            <label for="produto_id">Produto</label>

            <select name="produto_id" id="produto_id" required>

                <option value="">
                    Selecione um produto
                </option>

                @foreach($produtos as $produto)

                    <option
                        value="{{ $produto->id }}"
                        {{ old('produto_id') == $produto->id ? 'selected' : '' }}
                    >
                        {{ $produto->nome }} - {{ $produto->marca }} - Estoque: {{ $produto->estoque }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="campo">
            <label for="tipo">Tipo de movimentação</label>

            <select name="tipo" id="tipo" required>

                <option value="">
                    Selecione
                </option>

                <option value="Entrada" {{ old('tipo') == 'Entrada' ? 'selected' : '' }}>
                    Entrada
                </option>

                <option value="Saída" {{ old('tipo') == 'Saída' ? 'selected' : '' }}>
                    Saída
                </option>

            </select>
        </div>

        <div class="campo">
            <label for="quantidade">Quantidade</label>

            <input
                type="number"
                name="quantidade"
                id="quantidade"
                min="1"
                value="{{ old('quantidade') }}"
                required
            >
        </div>

        <div class="campo">
            <label for="data_movimentacao">Data da movimentação</label>

            <input
                type="date"
                name="data_movimentacao"
                id="data_movimentacao"
                value="{{ old('data_movimentacao', date('Y-m-d')) }}"
                required
            >
        </div>

        <div class="botoes">

            <a href="{{ route('movimentacoes.index') }}" class="botao voltar">
                Voltar
            </a>

            <button type="submit">
                Registrar Movimentação
            </button>

        </div>

    </form>

</div>

</body>
</html>