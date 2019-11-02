<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="col d-lg-none">
                                    <img src="{{asset('/storage/images/logo_color.png')}}" class="img-fluid" alt="Lancey Leilões">
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem vindo</h1>
                                </div>
                                <form action="{{url('admin/login')}}" method="post" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="login" class="form-control form-control-user @error('login') is-invalid @enderror"  value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Login">
                                        @error('login')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                           </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Senha" >

                                        @error('password')
                                         <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">Esqueceu sua senha ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
