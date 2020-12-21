@extends('layouts.layoutForm')

@section('content')
<div class="ibox-content">
    <form method="POST" action="{{ route('register') }}">
        @csrf

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
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

        <div class="form-group row mb-0">
            <div class="col-md-7 offset-md-5">
                <button type="submit" class="btn btn-tema btn-block">
                    Registrar
                </button>
            </div>
        </div>
    </form>
</div>
@endsection