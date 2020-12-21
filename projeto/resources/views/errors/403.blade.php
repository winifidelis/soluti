@extends('layouts.layoutForm')

@section('content')

<div class="text-center animated fadeInDown">
    <h1>Erro 403</h1>
    <h3 class="font-bold">Você não tem permissão para acessar esta página!</h3>
    <a href="{{ url()->previous() }}">
        <button type="button" class="btn btn-w-m btn-primary">Voltar</button>
    </a>
</div>
@endsection