@extends('admin.layouts.app')

@section('title', 'Editar Dúvida')

@section('header')
    <h1 class="text-lg text-black-500">Editar dúvida: {{ $support->subject }}</h1>
@endsection

@section('content')

    <form action="{{ route('supports.update', $support->id) }}" method="post">
        @method('put')
        @include('admin.supports.partials.form', [
            'support' => $support,
        ])
    </form>

@endsection