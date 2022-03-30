@extends('template.layout')

@section('content')
    <header class="jumbotron">
        <h3>Cadastrar Usuário</h3>
    </header>
    <section class="row">
        <div class="col-6 mr-auto ml-auto bg-light"
             style="border: 1px solid #999;border-radius:1rem;padding:1.5rem 3rem;">
            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user">&nbsp;</i></span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at">&nbsp;</i></span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key">&nbsp;</i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" required/>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary mt-3">
                        <i class="fa-solid fa-user-check">&nbsp;</i>Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
