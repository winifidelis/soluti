@extends('layouts.layoutForm')

@section('content')

<div class="ibox-content">
    <form class="m-t" role="form" action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group row">
            <div class="col-md-3">
                <label for="email" class="col-form-label text-md-right">Email</label>
            </div>
            <div class="col-md-9">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-3">
                <label for="password" class="col-form-label text-md-right">Senha</label>
            </div>
            <div class="col-md-9">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-tema block full-width m-b">Login</button>
            </div>
        </div>

        <div class="form-group row m-b">
            <div class="col-md-9 offset-md-3">
                <a href="{{ route('password.request') }}">
                    <small>Recuperar senha</small>
                </a>
            </div>
        </div>


        <p class="text-muted text-center">
            <small>Ainda não é cadastrado?</small>
        </p>
        <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Criar uma conta</a>
    </form>
</div>
@endsection