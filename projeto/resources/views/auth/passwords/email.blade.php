@extends('layouts.layoutForm')

@section('content')
<div class="ibox-content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group row">
            <div class="col-md-3">
                <label for="email" class="col-form-label text-md-right">Seu email</label>

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

        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-tema block full-width m-b">
                    Enviar link para o email
                </button>
            </div>
        </div>
        <br><br><br>
        <br><br><br>
    </form>
</div>
@endsection