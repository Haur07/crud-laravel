@extends('layouts.app')

@section('content')

<style>
    body {
        background: url(https://img.freepik.com/free-vector/simple-white-abstract-gradient-background_53876-99910.jpg?size=626&ext=jpg) no-repeat center fixed;
        background-size: 132em 75em;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agenda') }}
                    <a href="{{ route('home') }}" type="button" class="float-right btn btn-secondary">Voltar</a>
                </div>

                <div class="card-body">
                    <form class="row g-3" action="{{ route('inserir') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col-md-6">
                            <label for="data" class="form-label">Data</label>
                            <input type="text" class="form-control" id="data" name="data" value="{{ old('data') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="compromisso" class="form-label">Compromisso</label>
                            <input type="text" class="form-control" id="compromisso" name="compromisso" value="{{ old('compromisso') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ old('categoria') }}">
                        </div>
                        <div class="col-12" style="margin: 15px 0;">
                            <label for="observacao" class="form-label">Observação</label>
                            <textarea class="form-control" id="observacao" name="observacao" rows="7">{{ old('observacao') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
