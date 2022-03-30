@extends('template.layout')

@section('content')
    <header class="jumbotron">
        <h3>Cadastrar URL</h3>
    </header>
    <section class="row">
        <div class="col-10 mr-auto ml-auto">
            <form method="post">
                @csrf
                <div class="mb-3">
                    <input type="url" class="form-control" id="input-url" name="input-url"
                           placeholder="Insira uma URL que deseja rastrear"
                           required />
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk">&nbsp;</i>Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
