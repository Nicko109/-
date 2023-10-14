@extends('layouts.auth')

@section('content')
    <div class="page-wrapper">
        <div class="container">
            <div class="content">
                <main class="content__main">
                    <h2 class="content__main-heading">Вход на сайт</h2>
{{--                    <div class="card-header">{{ __('Login') }}</div>--}}
                        <form class="form" method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
                            <div class="form__row">
                                <label class="form__label" for="email">E-mail <sup>*</sup></label>
                                    <input id="email" type="text"
                                           class="form__input @error('email') form__input--error @enderror"
                                           value="{{ old('email') }}"  type="text" name="email" id="email"  placeholder="Введите e-mail">
                                    @error('email')
                                    <span class="form__message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form__row">
                                <label class="form__label" for="password">Пароль <sup>*</sup></label>

                                    <input id="password" type="password"
                                           class="form__input @error('password') form__input--error @enderror" name="password" placeholder="Введите пароль">
                                    @error('password')
                                    <span class="form__message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form__row form__row--controls">
                                @if($errors->any())
                                    <p class="error-message">Пожалуйста, исправьте ошибки в форме</p>
                                @endif
                                <input class="button" type="submit" name="" value="Войти">
                            </div>
                        </form>
                </main>
            </div>
        </div>
    </div>
@endsection
