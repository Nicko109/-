@extends('layouts.auth')

@section('content')
    <div class="page-wrapper">
        <div class="container">
            <div class="content">
                <main class="content__main">
                    <h2 class="content__main-heading">Регистрация аккаунта</h2>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off" class="form">
                        @csrf
                        <div class="form__row">
                            <label class="form__label" for="email">E-mail <sup>*</sup></label>
                                <input id="email" type="text" class="form__input @error('email') form__input--error @enderror"
                                       name="email" placeholder="Введите e-mail">

                                @error('email')
                                <span class="form__message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form__row">
                            <label class="form__label" for="password">Пароль <sup>*</sup></label>

                                <input id="password" type="password"
                                       class="form__input @error('password') form__input--error @enderror" name="password"
                                       placeholder="Введите пароль">
                                @error('password')
                                <span class="form__message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form__row">
                            <label class="form__label" for="name">Имя <sup>*</sup></label>

                                <input id="name" type="text" class="form__input @error('name') form__input--error @enderror"
                                       name="name" value="{{ old('name') }}" placeholder="Введите имя">

                                @error('name')
                                <span class="form__message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form__row form__row--controls">
                            @if($errors->any())
                                <p class="error-message">Пожалуйста, исправьте ошибки в форме</p>
                            @endif

                            <input class="button" type="submit" name="" value="Зарегистрироваться">
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
