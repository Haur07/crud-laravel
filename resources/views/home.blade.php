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
                    <a href="{{ route('criar') }}" type="button" class="float-right btn btn-primary">Adicionar Agenda</a>
                </div>
                <?php                 
                use Illuminate\Support\Facades\DB;
                $agendas = DB::select('select * from agenda');
                ?>

                <script src="jquery-3.3.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                    var msg = '{!! Session::get('create') !!}';
                    var exist = '{!! Session::get('create') !!}';
                    if(exist) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })
                        Toast.fire({
                        icon: 'success',
                        title: 'Agenda adicionada com successo!'
                        })}
                </script>
                <script>
                    var msg = '{!! Session::get('update') !!}';
                    var exist = '{!! Session::get('update') !!}';
                    if(exist) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })
                        Toast.fire({
                        icon: 'success',
                        title: 'Agenda atualizada com successo!'
                        })}
                </script>
                <script>
                    var msg = '{!! Session::get('delete') !!}';
                    var exist = '{!! Session::get('delete') !!}';
                    if(exist) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })
                        Toast.fire({
                        icon: 'success',
                        title: 'Agenda excluída com successo!'
                        })}
                </script>

                <div class="card-body">
                    @if (isset($agendas))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Compromisso</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Observação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agendas as $agenda)
                                    <tr>
                                        <th scope="row">{{ $agenda->id }}</th>
                                        <td>{{ $agenda->data }}</td>
                                        <td>{{ $agenda->compromisso }}</td>
                                        <td>{{ $agenda->categoria }}</td>
                                        <td>{{ $agenda->observacao }}</td>
                                        <td class="row">
                                            <a href="{{ route('editar', $agenda->id) }}" type="button" class="btn btn-secondary" style="margin-left: 12px">Editar</a>
                                            {!! Form::open(['class'=>'', 'name'=>'form', 'route'=>['excluir', $agenda->id], 'method'=>'delete']) !!}
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" style="margin-left: 10px;" onclick="return confirm('Tem certeza?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

