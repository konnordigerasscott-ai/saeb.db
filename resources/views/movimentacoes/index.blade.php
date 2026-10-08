<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Estoque</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
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

        .botoes {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .botao {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            background: #2563eb;
        }

        .voltar {
            background: #555;
        }

        .mensagem {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            background: #dff0d8;
            color: #27632a;
        }

        .alerta {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            background: #fff3cd;
            color: #856404;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        .normal {
            color: green;
            font-weight: bold;
        }

        .baixo {
            color: red;
            font-weight: bold;
        }

        .vazio {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Gestão de Estoque</h1>

    <div class="botoes">

        <a href="{{ route('dashboard') }}" class="botao voltar">
            Voltar
        </a>

        <a href="{{ route('movimentacoes.create') }}" class="botao">
            Nova Movimentação
        </a>

    </div>

    @if(session('sucesso'))
        <div class="mensagem">
            {{ session('sucesso') }}
        </div>
    @endif

    @if(session('alerta'))
        <div class="alerta">
            {{ session('alerta') }}
        </div>
    @endif

    @if(session('erro'))
        <div class="alerta">
            {{ session('erro') }}
        </div>
    @endif

    @if(count($produtos) > 0)

        <table>

            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Estoque</th>
                    <th>Estoque Mínimo</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach($produtos as $produto)

                    <tr>

                        <td>
                            {{ $produto['nome'] }}
                        </td>

                        <td>
                            {{ $produto['marca'] }}
                        </td>

                        <td>
                            {{ $produto['modelo'] }}
                        </td>

                        <td>
                            {{ $produto['estoque'] }}
                        </td>

                        <td>
                            {{ $produto['estoque_minimo'] }}
                        </td>

                        <td>

                            @if($produto['estoque'] < $produto['estoque_minimo'])

                                <span class="baixo">
                                    ESTOQUE BAIXO
                                </span>

                            @else

                                <span class="normal">
                                    ESTOQUE NORMAL
                                </span>

                            @endif

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="vazio">
            Nenhum produto cadastrado no estoque.
        </div>

    @endif

</div>

</body>
</html>