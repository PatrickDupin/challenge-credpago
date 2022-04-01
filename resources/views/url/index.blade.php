@extends('template.layout')

@section('content')
    <header class="jumbotron">
        <h3>Lista de URL's cadastradas</h3>
    </header>

    <section>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">URL</th>
                <th scope="col">Status Code</th>
{{--                <th scope="col">Resposta</th>--}}
                <th scope="col">Data consulta</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($urls as $url)
                <tr>
                    <td>{{ $url['url'] }}</td>
                    <td>{{ $url['status_code'] }}</td>
{{--                    <td>{{ $url['response'] }}</td>--}}
                    <td>{{ date('d/m/Y - H:i:s', strtotime($url['updated_at'])) }}</td>
                    <td class="d-flex justify-content-around">
                        <button class="btn btn-sm btn-primary" title="Visualizar o corpo da resposta">
                            <i class="fa-solid fa-eye"></i></button>
                        @auth
                            <form method="post"
                                  action="/url/{{ $url['id'] }}"
                                  onSubmit="return confirm('Tem certeza que deseja remover a URL {{ $url['url'] }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                            </form>
                        @endauth
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @if(empty($url))
            <span class="d-flex justify-content-around">Nenhum registro encontrado</span>
        @endif
    </section>
@endsection
