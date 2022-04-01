@extends('template.layout')

@section('content')
    <header class="jumbotron">
        <h3>Acesso Restrito</h3>
        <hr class="my-4">
        <p>Apenas usuários autenticados podem realizar consultas ou cadastros de URL's para rastreamento.</p>
    </header>
    <section>
        <div class="row">
            <div class="col-5 mr-auto ml-auto bg-light"
                 style="border: 1px solid #999;border-radius:1rem;padding:1.5rem 3rem;">
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Usuário</label>
                        <input type="email" class="form-control" id="email" name="email" required/>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required/>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-sm btn-primary mt-3">
                            <i class="fa-solid fa-user-lock">&nbsp;</i>Entrar
                        </button>
                        <a href="/registrar" class="btn btn-sm btn-secondary mt-3">
                            <i class="fa-solid fa-user-plus">&nbsp;</i>Registrar-se
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
