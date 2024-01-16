<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Listagem dos Suportes</h1>

    <a href="{{ route('supports.create') }}">Criar Dúvida</a>

    <table>
        <thead>
            <th>assunto</th>
            <th>status</th>
            <th>descrição</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($supports as $sup)
                <tr>
                    <td>{{ $support->subject }}</td>
                    <td>{{ $support->status }}</td>
                    <td>{{ $support->body }}</td>
                    <td>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
