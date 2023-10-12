<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            @foreach($projects as $project)
                <li class="main-navigation__list-item{{ request('project') == $project->id ? ' main-navigation__list-item--active' : '' }}">
                    <a class="main-navigation__list-item-link" href="{{ route('personal.main.index', ['project' => $project->id]) }}">{{ $project->title }}</a>
                    <span class="main-navigation__list-item-count">{{ $project->tasks->count() }}</span>
                </li>
            @endforeach
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="{{ route('main.project.create') }}">Добавить проект</a>
</section>
