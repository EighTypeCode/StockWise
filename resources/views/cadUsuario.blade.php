<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Cadastrar Novo Usuário</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ url('/usuarios') }}">
        @csrf

        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required maxlength="100"><br><br>

        <label for="nome">Email:</label><br>
        <input type="email" id="email" name="email" required maxlength="200"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="" id="senha" name="senha" required minlength="6"><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
