<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistema de Controle de Estoque</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f2f4f7;
        }

        .login-container {
            width: 400px;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.12);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #1e293b;
        }

        .login-container p {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        .campo input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .campo input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .botao {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .botao:hover {
            background: #1d4ed8;
        }

        .erro {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }

        .validacao {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="login-container">

    <h1>Controle de Estoque</h1>

    <p>Entre com seus dados para acessar o sistema</p>

    @if(session('erro'))
        <div class="erro">
            {{ session('erro') }}
        </div>
    @endif

    @if(session('status'))
        <div class="erro">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="campo">

            <label for="email">E-mail</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Digite seu e-mail"
                required
                autofocus
            >

            @error('email')
                <div class="validacao">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="campo">

            <label for="password">Senha</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Digite sua senha"
                required
            >

            @error('password')
                <div class="validacao">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button type="submit" class="botao">
            Entrar
        </button>

    </form>

</div>

</body>
</html>