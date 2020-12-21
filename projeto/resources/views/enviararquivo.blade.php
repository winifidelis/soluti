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
                        <div class="row">
                            <div class="col-lg-10">
                                <input id="arquivos[]" name="arquivos[]" type="file" class="custom-file-input" multiple="multiple" accept=".pdf">
                                <label for="arquivos" class="custom-file-label">Selecione os arquivos.</label>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-w-m btn-primary">Enviar arquivos</button>
                            </div>
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