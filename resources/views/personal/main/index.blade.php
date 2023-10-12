@extends('personal.layouts.main')

@section('content')
            <main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="{{ route('personal.main.index') }}" autocomplete="off">
                    <input class="search-form__input" type="text" name="title" placeholder="Поиск по задачам" value="{{ request()->get('title') }}">

                    <input class="search-form__submit" type="submit">


                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="{{ route('personal.main.index', ['filter' => 'all']) }}" class="tasks-switch__item{{ request()->has('filter') && request('filter') === 'all' ? ' tasks-switch__item--active' : '' }}">Все задачи</a>
                        <a href="{{ route('personal.main.index', ['filter' => 'today']) }}" class="tasks-switch__item{{ request()->has('filter') && request('filter') === 'today' ? ' tasks-switch__item--active' : '' }}">Повестка дня</a>
                        <a href="{{ route('personal.main.index', ['filter' => 'tomorrow']) }}" class="tasks-switch__item{{ request()->has('filter') && request('filter') === 'tomorrow' ? ' tasks-switch__item--active' : '' }}">Завтра</a>
                        <a href="{{ route('personal.main.index', ['filter' => 'overdue']) }}" class="tasks-switch__item{{ request()->has('filter') && request('filter') === 'overdue' ? ' tasks-switch__item--active' : '' }}">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox">
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>
                </form>
                <table class="tasks">
                    @foreach($tasks as $task)
                    <tr class="tasks__item task">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                                <span class="checkbox__text">{{ $task->title }}</span>
                            </label>
                        </td>

                        <td class="task__file">
                            @if(isset($task['file']))
                            <a class="download-link" href="#">Home.psd</a>
                            @endif
                        </td>

                        <td class="task__date">{{ \Carbon\Carbon::parse($task->deadline)->format('d.m.Y') }}</td>
                    </tr>
                @endforeach

                    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
                </table>
                <div>
                    {{ $tasks->withQueryString()->links() }}
                </div>
            </main>
@endsection
