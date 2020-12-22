@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Grupos</h2>
    </div>
</div>


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Lista completa dos grupos</h5>
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
                                $TodosOsGrupos = \App\Models\Grupo::all();
                                ?>
                                @foreach($TodosOsGrupos as $grupo)
                                <tr class="gradeX">
                                    <td>{{$grupo->nome}}</td>
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

<div class="modal inmodal fade" id="novo_grupo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Adicionar novo grupo</h4>
            </div>
            <form class="m-t-md" method="POST" id="gravar" name="gravar" action="{{ route('grupos.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="table-responsive">
                        <div class="ibox-content">
                            <div class="row">
                                <label class="col-sm-2">Nome:</label>
                                <div class="col-sm-10">
                                    <input type="text" id="nome" name="nome" />
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
            $('#novo_grupo').modal('show');
        }

        function gravarform() {
            if (document.getElementById('nome').value === "") {
                alert('digite um nome');
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