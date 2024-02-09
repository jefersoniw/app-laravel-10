@extends('admin.layouts.app')

@section('title', 'Detalhes')

@section('header')
    <h1 class="text-lg text-black-500">Detalhes da dúvida {{ $support->subject }}</h1>
@endsection

@section('content')

    <form action="{{ route('supports.update', $support->id) }}" method="post">
        @method('put')
        @include('admin.supports.partials.form', [
            'support' => $support,
        ])
    </form>

@endsection



{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Detalhes da dúvida {{ $support->subject }}</h1>

    <x-alert />

    <a href="{{ route('supports.index') }}">
        [ Voltar ]
    </a>

    <form action="{{ route('supports.update', $support->id) }}" method="post">
        @method('put')
        @csrf

        <input type="text" placeholder="assunto" name="subject" value="{{ $support->subject ?? old('subject') }}">
        <input type="text" placeholder="Status" name="status" value="{{ $support->status }}" readonly>
        <textarea name="body" id="body" cols="30" rows="5" placeholder="descrição">{{ $support->body ?? old('body') }}</textarea>

        <button type="submit">Atualizar</button>
        <a href="{{ route('supports.delete', $support->id) }}">
            [ Excluir ]
        </a>
    </form>
</body>

</html> --}}
