@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Páginas
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova Página</a>
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>
                                <a href="{{ route('pages.edit', ['page' => $page->id]) }}"
                                    class="btn btn-sm btn-warning">Editar</a>
                                @if($loggedId != $page->id)
                                <form class="d-inline" action="{{ route('pages.destroy', ['page' => $page->id]) }}" method="POST" onsubmit="return confirm('Deseja mesmo deletar?')">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $pages->links() }}

@endsection
