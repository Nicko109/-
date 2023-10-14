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
                    <a href="{{ route('personal.main.index', ['filter' => 'completed']) }}" class="tasks-switch__item{{ request()->has('filter') && request('filter') === 'completed' ? ' tasks-switch__item--active' : '' }}">Выполненные</a>
                </nav>


            </div>
        </form>
        <table class="tasks">
            @foreach($tasks as $task)
                <tr class="tasks__item task {{ $task->deadline <= now()->toDateString() ? 'task--important' : '' }}">
                    <td class="task__select">

                        <form method="POST" action="{{ route('tasks.toggle-status', $task) }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="checkbox">v</button>
                            <span class="task__checkbox {{ $task->status === 1 ? 'task---completed' : '' }}">{{ $task->title }}</span>
                        </form>
                    </td>

                    <td class="task__file">
                        @if(isset($task['file']))
                            <a class="download-link" href="#">Home.psd</a>
                        @endif
                    </td>

                    <td class="task__date">{{ \Carbon\Carbon::parse($task->deadline)->format('d.m.Y') }}</td>

                </tr>
            @endforeach

        </table>
        <div>
            {{ $tasks->withQueryString()->links() }}
        </div>
    </main>
@endsection
