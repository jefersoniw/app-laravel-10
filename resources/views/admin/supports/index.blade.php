@extends('admin.layouts.app')

@section('title', 'Suportes')

@section('header')
    @include('admin.supports.partials.header', [
        'total' => $supports->total(),
    ])

@endsection

@section('content')

    @include('admin.supports.partials.content', [
        'supports' => $supports,
    ])

    {{-- <table>
        <thead>
            <th>assunto</th>
            <th>status</th>
            <th>descrição</th>
            <th>Ação</th>
        </thead>
        <tbody>
            @foreach ($supports->items() as $sup)
                <tr>
                    <td>{{ $sup->subject }}</td>
                    <td>{{ getStatusSupport($sup->status) }}</td>
                    <td>{{ $sup->body }}</td>
                    <td>
                        <a href="{{ route('supports.show', $sup->id) }}"> Detalhes</a>
                        |
                        <a href="{{ route('supports.delete', $sup->id) }}"> Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    <x-pagination :paginator="$supports" :appends="$filter" />

@endsection
