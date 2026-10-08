<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Produto</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f8;
        }

        .topo {
            background: #1e293b;
            color: white;
            padding: 20px 40px;
        }

        .conteudo {
            max-width: 800px;
            margin: auto;
            padding: 40px;
        }

        .formulario {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,.08);
        }

        .campo {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .botao {
            padding: 11px 18px;
            border: none;
            border-radius: 6px;
            color: white;
            background: #2563eb;
            cursor: pointer;
            text-decoration: none;
        }

        .voltar {
            background: #64748b;
        }

        .erro {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<header class="topo">
    <h1>Cadastrar Produto</h1>
</header>

<main class="conteudo">

    <form
        method="POST"
        action="{{ route('produtos.store') }}"
        class="formulario"
    >

        @csrf

        <div class="campo">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ old('nome') }}">
            @error('nome')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Marca</label>
            <input type="text" name="marca" value="{{ old('marca') }}">
            @error('marca')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Modelo</label>
            <input type="text" name="modelo" value="{{ old('modelo') }}">
            @error('modelo')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Material</label>
            <input type="text" name="material" value="{{ old('material') }}">
            @error('material')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Tamanho</label>
            <input type="text" name="tamanho" value="{{ old('tamanho') }}">
            @error('tamanho')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Peso</label>
            <input type="number" step="0.01" name="peso" value="{{ old('peso') }}">
            @error('peso')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Tensão</label>
            <input type="text" name="tensao" value="{{ old('tensao') }}">
            @error('tensao')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Estoque inicial</label>
            <input type="number" name="estoque" min="0" value="{{ old('estoque', 0) }}">
            @error('estoque')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Estoque mínimo</label>
            <input type="number" name="estoque_minimo" min="0" value="{{ old('estoque_minimo', 0) }}">
            @error('estoque_minimo')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('produtos.index') }}" class="botao voltar">
            Voltar
        </a>

        <button type="submit" class="botao">
            Cadastrar Produto
        </button>

    </form>

</main>

</body>
</html>