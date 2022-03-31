@extends('template.layout')

@section('content')
    <header class="jumbotron">
        <h2><i class="fa-brands fa-audible"></i> urlTracker</h2>
        <p>Rastreamento de status de websites.</p>
        <hr class="my-4">
        @if(!empty($usuario))
            <p><strong>{{ $usuario }}</strong>, seja bem vindo!</p>
            <p>Agora, você pode realizar consultas ou cadastros de URL's para rastreamento.</p>
        @else
            <p>Seus clientes podem acessar a esta aplicação web para cadastrar as URLs que desejam rastrear.</p>
        @endif
    </header>
@endsection
