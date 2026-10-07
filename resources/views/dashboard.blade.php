<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Controle de Estoque</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            color: #1e293b;
        }

        .topo {
            background: #1e293b;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topo h1 {
            font-size: 22px;
        }

        .usuario {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .sair {
            background: #dc2626;
            color: white;
            padding: 9px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
        }

        .conteudo {
            padding: 40px;
            max-width: 1200px;
            margin: auto;
        }

        .boas-vindas {
            margin-bottom: 35px;
        }

        .boas-vindas h2 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .boas-vindas p {
            color: #64748b;
            font-size: 16px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            font-size: 21px;
            margin-bottom: 12px;
        }

        .card p {
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 22px;
        }

        .botao {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 11px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .botao:hover {
            background: #1d4ed8;
        }

        @media (max-width: 700px) {
            .topo {
                padding: 15px 20px;
                flex-direction: column;
                gap: 15px;
            }

            .conteudo {
                padding: 25px 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header class="topo">

    <h1>Sistema de Controle de Estoque</h1>

    <div class="usuario">

        <span>
            Olá, {{ Auth::user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="sair">
                Sair
            </button>
        </form>

    </div>

</header>

<main class="conteudo">

    <div class="boas-vindas">

        <h2>Bem-vindo ao sistema!</h2>

        <p>
            Escolha uma das opções abaixo para continuar.
        </p>

    </div>

    <div class="cards">

        <div class="card">

            <h3>Cadastro de Produto</h3>

            <a href="#" class="botao">
                Cadastro de Produto
            </a>

        </div>

        <div class="card">

            <h3>Gestão de Estoque</h3>

            <a href="#" class="botao">
                Gestão de Estoque
            </a>

        </div>

    </div>

</main>

</body>
</html>