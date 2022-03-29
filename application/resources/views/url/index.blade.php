@extends('template.layout')

@section('content')
    <header class="jumbotron">
        <h3>Lista de URL's cadastradas</h3>
    </header>

    <section>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">URL</th>
                <th scope="col">Status Code</th>
                <th scope="col">Resposta</th>
                <th scope="col">Data consulta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($urls as $url)
                <tr>
                    <td>{{ $url['address'] }}</td>
                    <td>{{ $url['status_code'] }}</td>
                    <td>{{ $url['response'] }}</td>
                    <td>{{ $url['created_at'] }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </section>
@endsection
