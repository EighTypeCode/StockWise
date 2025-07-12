<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
            font-size: 24px;
            text-align: center;
            font-weight: 600;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            border: 1px solid transparent;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s ease, transform 0.2s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Novo Produto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('produto.store') }}">
            @csrf

            <div class="input-group">
                <label for="nome">Nome do Produto:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required placeholder="Ex: Monitor Gamer 27 polegadas">
            </div>

            <div class="input-group">
                <label for="categoria_id">Categoria:</label>
                <input type="text" id="categoria_id" name="categoria" value="{{ old('categoria_id') }}" required placeholder="Ex: Eletrônicos, Informática, etc.">
            </div>

            <div class="input-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4" placeholder="Informe detalhes do produto, como especificações técnicas, cor, etc.">{{ old('descricao') }}</textarea>
            </div>

            <div class="input-group">
                <label for="preco">Preço Unitário (R$):</label>
                <input type="number" id="preco" name="preco" value="{{ old('preco') }}" required step="0.01" min="0" placeholder="Ex: 1250.99">
            </div>

            <div class="input-group">
                <label for="quantidade">Quantidade Inicial em Estoque:</label>
                <input type="number" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" required min="0" placeholder="Ex: 50">
            </div>

            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</body>
</html>