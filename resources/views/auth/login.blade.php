@extends('layouts.app')

@section('content')

    <div class="container entrar">


        <div class="row justify-content-center">
            <div class="col-sm-5">
                @include('alert_danger')
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-4">
                <h2 class="text-center">
                    <span class="texto">Entrar com a sua conta</span>
                </h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="border borda">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email ou Login">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <input  type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Senha">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <div class="d-flex justify-content-between info">
                            @if (Route::has('password.request'))
                                <a  href="{{ route('password.request') }}">
                                    Esqueceu sua senha ?
                                </a>
                            @endif

                            <a href="{{url('/')}}/pessoa_fisica">Cadastre-se grátis</a>
                        </div>
                        <button class="btn btn-cor-principal btn-lg btn-block font-weight-bold">ENTRAR</button>

                        <div class="form-group">

                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                    Lembre-se de mim
                            </label>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
