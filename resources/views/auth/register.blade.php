@extends('layouts/fullLayoutMaster')

@section('title', 'Register')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset('css/base/pages/page-auth.css') }}">
@endsection

@php $referred = null; @endphp
@if ( request()->referred_id != null )
    @php
        $referred = DB::table('users')
            ->select('username','id')
            ->where('id', '=', request()->referred_id)
            ->first();
    @endphp
@endif

@section('content')
<x-guest-layout>
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Register v1 -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="javascript:void(0);" class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                    y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                    y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path"
                                            d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                            style="fill: currentColor"></path>
                                        <path id="Path1"
                                            d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                            fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                        </polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                        </polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                            points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h2 class="brand-text text-primary ml-1">Sysmo Company</h2>
                    </a>

                    <p class="card-text mb-2 text-center">Llena este formulario para poder iniciar sesion!</p>
                    <x-jet-validation-errors class="mb-4" />
                    @if ($referred != null)
                    <p class="card-text mb-2 text-center">Has sido invitado por: <span class="text-primary font-weight-bold">{{ $referred->username }}</span></p>
                    @endif
                    <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="register-firstname" class="form-label">Nombre</label>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    id="register-firstname" name="firstname" placeholder="Nombre"
                                    aria-describedby="register-firstname" tabindex="1" autofocus
                                    value="{{ old('firstname') }}" required />
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="register-lastname" class="form-label">Apellido</label>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    id="register-lastname" name="lastname" placeholder="Apellido"
                                    aria-describedby="register-lastname" tabindex="1" autofocus
                                    value="{{ old('lastname') }}" required />
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="register-username" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="register-username" name="username" placeholder="Username"
                                    aria-describedby="register-username" tabindex="1" autofocus
                                    value="{{ old('username') }}" required />
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="register-referred_id" class="form-label">ID del Referido</label>
                                @if ($referred != null)
                                <input type="number" class="form-control @error('referred_id') is-invalid @enderror"
                                id="register-referred_id" name="referred_id" placeholder="{{ $referred->username }}"
                                aria-describedby="register-referred_id" tabindex="1" autofocus
                                value="{{ $referred->id }}" readonly/>

                                @else

                                <input type="text" class="form-control @error('referred_id') is-invalid @enderror"
                                id="register-referred_id" name="referred_id" placeholder="Sin referido"
                                aria-describedby="register-referred_id" tabindex="1" autofocus
                                value="1" readonly/>
                                @endif
                                @error('referred_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="register-email" class="form-label">Correo</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="register-email" name="email" placeholder="Email@example.com"
                                    aria-describedby="register-email" tabindex="2" value="{{ old('email') }}" required />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                <label for="register-email" class="form-label">Confirmar Correo</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="register-email" name="email" placeholder="Email@example.com"
                                    aria-describedby="register-email" tabindex="2" value="{{ old('email') }}" required />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="register-password" class="form-label">Contraseña</label>

                                <div
                                    class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                                    <input type="password"
                                        class="form-control form-control-merge @error('password') is-invalid @enderror"
                                        id="register-password" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="register-password" tabindex="3" required />
                                    <div class="input-group-append">
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="register-password-confirm" class="form-label">Confirmar Contraseña</label>

                                <div class="input-group input-group-merge form-password-toggle">
                                    <input type="password" class="form-control form-control-merge"
                                        id="register-password-confirm" name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="register-password" tabindex="3" required
                                        autocomplete="new-password" />
                                    <div class="input-group-append">
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-12 ml-1">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="register-privacy-policy"
                                        required tabindex="4" />
                                    <label class="custom-control-label" for="register-privacy-policy">
                                        Acepto las <a href="#terms" class="text-danger">política y condiciones de
                                            privacidad</a>
                                    </label>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block" tabindex="5">Registrarme</button>
                        </div>
                    </form>

                    <p class="text-center mt-2">
                        <span>¿Ya tienes una cuenta?</span>
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}">
                            <span class="text-primary">Inicia sesión</span>
                        </a>
                        @endif
                    </p>

                </div>
            </div>
            <!-- /Register v1 -->
        </div>
    </div>
</x-guest-layout>
@endsection
