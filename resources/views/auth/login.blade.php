@extends('layouts.inicio')

@section('content')
<div class="m-grid m-grid--hor m-grid--root m-page">
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-color: #000;">
    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
      <div class="m-login__container">
        <div class="m-login__signin">
          <div class="m-login__head">
            <h3 class="m-login__title">
               {{ config('app.name') }}
            </h3>
          </div>
          <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
            <div class="form-group m-form__group">
              <input class="form-control m-input" value="{{ old('username') }}" type="text" placeholder="Código" name="username" autocomplete="off">
              @if ($errors->has('username'))
                  <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Contraseña" name="password">
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <div class="m-login__form-action">
              <button  type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Iniciar sesión
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
