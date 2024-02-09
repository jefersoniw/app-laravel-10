@extends('admin.layouts.app')

@section('title', 'Criar novo tópico')

@section('header')
    <h1 class="text-lg text-black-500">Nova dúvida</h1>
@endsection

@section('content')

    <form action="{{ route('supports.store') }}" method="post">
        @include('admin.supports.partials.form')
    </form>

@endsection
