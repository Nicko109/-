@extends('personal.layouts.main')

@section('content')


    <main class="content__main">
        <h2 class="content__main-heading">Добавление проекта</h2>
                    <form class="form" action="{{ route('main.project.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="form__row">
                            <label class="form__label" for="project_name">Название <sup>*</sup></label>
                            <input class="form__input @error('title') form__input--error @enderror" type="text" name="title" id="project_name" placeholder="Введите название проекта">
                            @error('title')
                            <span class="form__message" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form__row form__row--controls">
                            <input class="button" type="submit" name="" value="Добавить">
                        </div>
                    </form>
        </main>
        <!-- /.content -->

    <!-- /.content-wrapper -->
@endsection
