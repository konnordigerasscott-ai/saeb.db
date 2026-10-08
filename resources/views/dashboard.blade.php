<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            color: #172554;
            margin-bottom: 5px;
        }

        .subtitulo {
            color: #555;
            margin-bottom: 35px;
        }

        .cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            color: #172554;
            margin-top: 0;
        }

        .botao {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .botao:hover {
            background: #1d4ed8;
        }

        @media (max-width: 700px) {
            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Bem-vindo ao sistema!</h1>

    <div class="subtitulo">
        Escolha uma das opções abaixo para continuar.
    </div>

    <div class="cards">

        <div class="card">
            <h2>Cadastro de Produto</h2>

            <a href="{{ route('produtos.index') }}" class="botao">
                Cadastro de Produto
            </a>
        </div>

        <div class="card">
            <h2>Gestão de Estoque</h2>

            <a href="{{ route('movimentacoes.index') }}" class="botao">
                Gestão de Estoque
            </a>
        </div>

    </div>

</div>

</body>
</html>