<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Produto</title>

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
    <h1>Editar Produto</h1>
</header>

<main class="conteudo">

    <form
        method="POST"
        action="{{ route('produtos.update', $produto->id) }}"
        class="formulario"
    >

        @csrf
        @method('PUT')

        <div class="campo">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}">
            @error('nome')
                <div class="erro">{{ $message }}</div>
            @enderror
        </div>

        <div class="campo">
            <label>Marca</label>
            <input type="text" name="marca" value="{{ old('marca', $produto->marca) }}">
        </div>

        <div class="campo">
            <label>Modelo</label>
            <input type="text" name="modelo" value="{{ old('modelo', $produto->modelo) }}">
        </div>

        <div class="campo">
            <label>Material</label>
            <input type="text" name="material" value="{{ old('material', $produto->material) }}">
        </div>

        <div class="campo">
            <label>Tamanho</label>
            <input type="text" name="tamanho" value="{{ old('tamanho', $produto->tamanho) }}">
        </div>

        <div class="campo">
            <label>Peso</label>
            <input type="number" step="0.01" name="peso" value="{{ old('peso', $produto->peso) }}">
        </div>

        <div class="campo">
            <label>Tensão</label>
            <input type="text" name="tensao" value="{{ old('tensao', $produto->tensao) }}">
        </div>

        <div class="campo">
            <label>Estoque atual</label>
            <input type="number" value="{{ $produto->estoque }}" disabled>
        </div>

        <div class="campo">
            <label>Estoque mínimo</label>
            <input
                type="number"
                name="estoque_minimo"
                min="0"
                value="{{ old('estoque_minimo', $produto->estoque_minimo) }}"
            >
        </div>

        <a href="{{ route('produtos.index') }}" class="botao voltar">
            Voltar
        </a>

        <button type="submit" class="botao">
            Salvar Alterações
        </button>

    </form>

</main>

</body>
</html>