@extends('layouts.app')

@section('content')

    <div class="container entrar">


        <div class="row">
            <div class="col s12 xl6 offset-xl3">
                @include('alert_danger')
            </div>
        </div>


        <div class="row">
            <div class="col s12 xl6 offset-xl3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card">

                        <div class="card-image">
                            <div class="login_image">
                                <img class="responsive-img" src="{{asset('storage/images/logo_color.png')}}">
                            </div>
                        </div>

                        <div class="card-content">

                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror validate"  value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email ou Login">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">fingerprint</i>
                                    <input  type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror validate" required autocomplete="current-password" placeholder="Senha">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 m12 center-align">
                                    <button class="btn-large waves-effect waves-light" type="submit" name="action">ENTRAR
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col s12 m12 center-align">


                                    <label id="remenber">
                                        <input type="checkbox" name="remember" id="reme" {{ old('remember') ? 'checked' : '' }}>
                                        <span>Lembre-se de mim</span>
                                    </label>
                                </div>
                            </div>


                        </div>


                        <div class="card-action">

                            <div class="d-flex justify-content-between info">
                                @if (Route::has('password.request'))
                                    <a  href="{{ route('password.request') }}">
                                        Esqueceu sua senha ?
                                    </a>
                                @endif

                                <a href="{{url('/')}}/pessoa_fisica">Cadastre-se grátis</a>
                            </div>


                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
