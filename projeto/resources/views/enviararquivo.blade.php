@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Enviar arquivos</h2>
    </div>
</div>


<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Selecione arquivos pdf para enviar</h5>
                </div>
                <div class="ibox-content">
                    <form method="POST" id="form_arquivos" name="form_arquivos" action="{{ route('arquivos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row m-b">
                            <div class="col-lg-10">
                                <input id="arquivos[]" name="arquivos[]" type="file" class="custom-file-input" multiple="multiple" accept=".pdf">
                                <label for="arquivos" class="custom-file-label">Selecione os arquivos.</label>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-w-m btn-primary">Enviar arquivos</button>
                            </div>
                            <?php

                            use Illuminate\Support\Facades\Auth;

                            $TodosOsUsuarios = \App\Models\User::where('id', '!=', Auth::user()->id)->get();
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                Selecione os usuários para terem acesso ao arquivo
                            </div>
                            <div class="col-lg-8">
                                <select class="form-control m-b" id="user" name="user" onchange="selecionaUsuarios()">
                                    @foreach($TodosOsUsuarios as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" class="form-control" name="lista_usuarios[]" id="lista_usuarios" value="">
                            <div id="nomesSelecionados">

                            </div>
                            <script>
                                var users = [];
                                var usersNomes = [];
                                function selecionaUsuarios(){
                                    var u = document.getElementById('user');
                                    //alert(u.value+' - '+u.options[u.selectedIndex].text);
                                    if(users.indexOf(u.value) == -1){
                                        users.push(u.value);
                                        usersNomes.push(u.options[u.selectedIndex].text);
                                    }
                                    document.getElementById('nomesSelecionados').innerHTML = usersNomes;
                                    document.getElementById('lista_usuarios').value = JSON.stringify(users);
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scriptsfinais')
<script>
</script>
@endsection