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
                <th scope="col">Data consulta</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($urls as $url)
                <tr>
                    <td>{{ $url['url'] }}</td>
                    <td>{{ $url['status_code'] }}</td>
                    <td>{{ date('d/m/Y - H:i:s', strtotime($url['updated_at'])) }}</td>
                    <td class="d-flex justify-content-around">
                        <button id="{{ $url['id'] }}" class="btn btn-sm btn-primary btn-view" title="Visualizar o corpo da resposta"
                                data-toggle="modal" data-target="#modalBodyResponse"
                                data-response="{{ base64_encode($url['response']) }}"
                                onclick="exibirModalBodyResponse({{ $url['id'] }})">
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

        <div class="modal fade" id="modalBodyResponse" tabindex="-1" aria-labelledby="modalBodyResponseLabel" aria-hidden="true">>
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Body Response HTTP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="body-response"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function exibirModalBodyResponse (id) {
            let body_response = $("#" + id).data('response');
            document.getElementById('body-response').innerHTML = atob(body_response);
        }
    </script>
@endsection
