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
            <th>Ação</th>
        </thead>
        @dd($supports)
        <tbody>
            @foreach ($supports as $sup)
                <tr>
                    <td>{{ $sup['subject'] }}</td>
                    <td>{{ $sup['status'] }}</td>
                    <td>{{ $sup['body'] }}</td>
                    <td>
                        <a href="{{ route('supports.show', $sup['id']) }}"> Detalhes</a>
                        |
                        <a href="{{ route('supports.delete', $sup['id']) }}"> Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 3%">
        {{ $supports->links() }}
    </div>
</body>

</html>
