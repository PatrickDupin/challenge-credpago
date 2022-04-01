@extends('template.layout')

@section('content')
    <header class="jumbotron">
        <h3>Cadastrar URL</h3>
    </header>
    <section>
        <div class="row">
            <div class="col-10 mr-auto ml-auto">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="url" class="form-control" id="url" name="url"
                               placeholder="Insira uma URL que deseja rastrear"
                               aria-describedby="urlHelp"
                               required/>
                        <small id="urlHelp" class="form-text text-muted">Exemplo: http://urltracker.com</small>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk">&nbsp;</i>Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
