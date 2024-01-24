<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Nova dúvida</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    @endif

    <a href="{{ route('supports.index') }}">
        [ Voltar ]
    </a>

    <form action="{{ route('supports.store') }}" method="post">
        @csrf

        <input type="text" placeholder="assunto" name="subject" value="{{ old('subject') }}">
        <textarea name="body" id="body" cols="30" rows="5" placeholder="descrição">{{ old('body') }}</textarea>

        <button type="submit">Enviar</button>
    </form>
</body>

</html>
