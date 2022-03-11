@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row vh-100 justify-content-center align-items-center bg-dark bg-opacity-25">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success bg-opacity-50">
                <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link text-dark active" aria-current="true" data-bs-toggle="tab" href="#login">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" data-bs-toggle="tab" href="#register">Registrarse</a>
                    </li>
                </ul>
                </div>

                <div class="card-body tab-content">
                    <div class="tab-pane active" id="login">
                        <div class="text-center">
                            <h5>Inicio de Sesion</h5>
                        </div>
                    <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3 justify-content-center">

                                

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" id="emails">@</span>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo Electronico" value="{{ old('email') }}" required autocomplete="email" aria-describedby="emails" autofocus>
                                    </div>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text" id="lock"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                        </svg></span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password" aria-describedby="lock">
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0 justify-content-center">
                                <div class="col-md-8 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar session') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="register">
                        <div class="text-center">
                            <h5>Crear Cuenta Nueva</h5>
                        </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo Electronico" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}" required autocomplete="name" autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma Contraseña" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrate') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div> 
                <div class="card-footer d-flex justify-content-end">
                    <fecha-hoy></fecha-hoy>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


