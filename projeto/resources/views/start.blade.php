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
                                ?>
                                <tr class="gradeX">
                                    <td>{{$file->nome}}</td>
                                    <td>
                                        <a href="{{ route('producoes.edit',$arquivo->id) }}" class="btn btn-success btn-xs">Dar acesso</a>
                                        <a href="javascript:excluirProducao({{$arquivo->id}},'{{$arquivo->url}}')" class="btn btn-danger btn-xs">Excluir</a>
                                    </td>
                                </tr>
                                <form method="POST" id="excluir{{$arquivo->id}}" name="excluir{{$arquivo->id}}" action="{{ route('producoes.destroy',$arquivo->id) }}">
                                    <input name="_method" type="hidden" value="DELETE">
                                    @csrf
                                </form>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scriptsfinais')
<script>
    function excluirProducao(id, nome) {
        swal({
                title: "Excluir " + nome,
                text: "Tem certeza que deseja excluir esta producao?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#27c434",
                confirmButtonText: "Sim, tchau!",
                cancelButtonText: "Não, estou arrependido!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Vamo lá!", "Tchau " + nome, "success");
                    document.getElementById('excluir' + id).submit();
                } else {
                    swal("Cancelado", "Não será excluído :)", "error");
                }
            });
    }

    function enviarProducaoTeste(id, nome) {
        swal({
                title: "Enviar TESTE: " + nome,
                text: "Tem certeza que deseja enviar esta producao de TESTE?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#27c434",
                confirmButtonText: "Sim, manda brasa!",
                cancelButtonText: "Não, tenho que arrumar!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    /* ENVIA PRODUÇÃO*/
                    let data = {
                        id: id,
                        _token: '{{csrf_token()}}',
                    };
                    $.ajax({
                        type: 'POST',
                        url: "{{route('enviarProducaoTeste')}}",
                        data: data,
                        dataType: 'json',
                        success: function(res) {
                            //alert('Email enviado com sucesso');
                        },
                        error: function(err) {
                            alert('Erro ao enviar email');
                        }
                    });
                    /*FIM ENVIO PRODUÇÃO*/
                    swal("Vamo lá!", "Os emails já estão sendo enviados!", "success");
                    //document.getElementById('excluir' + id).submit();
                } else {
                    swal("Cancelado", "Não será enviado :)", "error");
                }
            });
    }

    function enviarProducao(id, nome) {
        swal({
                title: "Enviar: " + nome,
                text: "Tem certeza que deseja enviar esta producao para o email de seus contatos?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#27c434",
                confirmButtonText: "Sim, manda brasa!",
                cancelButtonText: "Não, tenho que arrumar!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    /* ENVIA PRODUÇÃO*/
                    let data = {
                        id: id,
                        _token: '{{csrf_token()}}',
                    };
                    $.ajax({
                        type: 'POST',
                        url: "{{route('enviarProducao')}}",
                        data: data,
                        dataType: 'json',
                        success: function(res) {
                            //alert('Email enviado com sucesso');
                        },
                        error: function(err) {
                            alert('Erro ao enviar email');
                        }
                    });
                    /*FIM ENVIO PRODUÇÃO*/
                    swal("Vamo lá!", "Os emails já estão sendo enviados!", "success");
                    //document.getElementById('excluir' + id).submit();
                } else {
                    swal("Cancelado", "Não será enviado :)", "error");
                }
            });
    }

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