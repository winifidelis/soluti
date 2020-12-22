@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Dashboard</h2>
    </div>
</div>


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Lista completa de seus arquivos</h5>
                    <div class="ibox-tools">
                        <a href="{{ route('enviararquivo') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> &nbsp;arquivo</a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover tabela-arquivos">
                            <thead>
                                <th>Titulo</th>
                                <th>Ações</th>
                            </thead>
                            <tbody>
                                <?php

                                use Illuminate\Support\Facades\Auth;

                                $TodosOsArquivos = \App\Models\Userarquivo::where('user_id', '=', Auth::user()->id)->get();
                                ?>
                                @foreach($TodosOsArquivos as $arquivo)
                                <?php
                                $file = \App\Models\Arquivo::find($arquivo->arquivo->id);
                                $dono = \App\Models\Userarquivo::where("arquivo_id", "=", $file->id)
                                    ->where("proprietario", "=", '1')
                                    ->first();
                                $dono = \App\Models\User::find($dono->user_id);
                                $todosPermitidos = \App\Models\Userarquivo::select('users.name')
                                    ->join('users', 'users.id', '=', 'userarquivos.user_id')
                                    ->where("arquivo_id", "=", $file->id)
                                    ->get();
                                //dd(count($todosPermitidos));
                                $listaPermitidos = '';
                                for ($i = 0; $i < count($todosPermitidos); $i++) {
                                    $listaPermitidos = $listaPermitidos . $todosPermitidos[$i]->name . ',';
                                }
                                ?>
                                <tr class="gradeX">
                                    <td>{{$file->nome}}</td>
                                    <td>
                                        <a href="javascript:abrirModal('{{$file->nome}}','{{$dono->name}}','{{$listaPermitidos}}','{{$file->url}}')" class="btn btn-success btn-xs">Ver</a>
                                    </td>
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

<script>
    function abrirModal(nomeArquivo, dono, listaUser, link) {
        document.getElementById('nomeDoArquivo').innerHTML = nomeArquivo;
        document.getElementById('responsavelDoArquivo').innerHTML = dono;
        document.getElementById('usuariosComPermissaoNoarquivo').innerHTML = listaUser;
        document.getElementById('linkParaDownload').href = "{{asset('uploads/docs/')}}" + "/" + link;
        $('#modal_pdf').modal('show');
    }
</script>

<div class="modal inmodal fade" id="modal_pdf" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="nomeDoArquivo"></h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="ibox-content">
                        <div class="row">
                            <label class="col-sm-2">Responsável:</label>
                            <div class="col-sm-10">
                                <p id="responsavelDoArquivo"></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2">Usuários com permissão:</label>
                            <div class="col-sm-10">
                                <p id="usuariosComPermissaoNoarquivo"></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-10">
                                <a href="#" id="linkParaDownload" class="btn btn-success btn-xs">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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