@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Usuários</h2>
    </div>
</div>


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Lista completa dos usuários</h5>
                    <div class="ibox-tools">
                        <a href="javascript:abrirModal()" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> &nbsp;grupo</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover tabela-arquivos">
                            <thead>
                                <th>Nome</th>
                            </thead>
                            <tbody>
                                <?php
                                $TodosOsUsuarios = \App\Models\User::all();
                                ?>
                                @foreach($TodosOsUsuarios as $user)
                                <tr class="gradeX">
                                    <td>{{$user->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="novo_user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Adicionar novo usuário</h4>
            </div>
            <form class="m-t-md" method="POST" id="gravar" name="gravar" action="{{ route('usuarios.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="table-responsive">
                        <div class="ibox-content">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="name" class="col-form-label text-md-right">Nome</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="email" class="col-form-label text-md-right">Email</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="password" class="col-form-label text-md-right">Senha</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="password-confirm" class="col-form-label text-md-right">Repita a senha</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="password-confirm" class="col-form-label text-md-right">Selecione um grupo</label>
                                </div>
                                <?php
                                $TodosOsGrupos = \App\Models\Grupo::all();
                                ?>
                                <div class="col-md-7">
                                    <select class="form-control m-b" id="grupo" name="grupo">
                                        @foreach($TodosOsGrupos as $grupo)
                                        <option value="{{$grupo->id}}">{{$grupo->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="gravarform()">Gravar novo grupo</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                    </div>
        </div>
    </div>

    <script>
        function abrirModal() {
            $('#novo_user').modal('show');
        }

        function gravarform() {
            if (document.getElementById('name').value === "") {
                alert('digite um nome');
                return;
            }
            if (document.getElementById('email').value === "") {
                alert('digite um email');
                return;
            }
            if (document.getElementById('password').value === "") {
                alert('digite uma senha');
                return;
            }
            if(document.getElementById('password').value.length <= 7){
                alert('a senha deve conter 8 ou mais caracteres');
                return;
            }
            if (document.getElementById('password_confirmation').value === "") {
                alert('repita a senha');
                return;
            }
            if (document.getElementById('password_confirmation').value !=  document.getElementById('password').value) {
                alert('a confirmação de senha está errada');
                return;
            }
            document.getElementById('gravar').submit();
        }
    </script>

    @endsection

    @section('scriptsfinais')
    <script>
        $(document).ready(function() {
            $('.tabela-arquivos').DataTable({
                pageLength: 10,
                responsive: true,

                info: false,
                paging: true,
                dom: '<"html5buttons"B>lTfgitp',
                //dom: '<"toolbar tool2"><"clear-filter">frtip',

                oLanguage: {
                    //"sSearch": "Digite aqui algo para refinar sua busca",
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Buscar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                },

                buttons: [],
            });
        });
    </script>
    @endsection