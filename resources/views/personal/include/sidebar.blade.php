<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            @if($projects->count() > 0 )
                <li class="main-navigation__list-item{{ request('project') == 0 ? ' main-navigation__list-item--active' : '' }}">
                    <a class="main-navigation__list-item-link" href="{{ route('personal.main.index', ['projects' => 0, 'filter' => 'all']) }}">Все проекты</a>
                </li>
            @endif
            @foreach($projects as $project)
                <li class="main-navigation__list-item{{ request('project') == $project->id ? ' main-navigation__list-item--active' : '' }}">
                    <a class="main-navigation__list-item-link" href="{{ route('personal.main.index', ['project' => $project->id, 'filter' => 'all']) }}">{{ $project->title }}</a>
                    <span class="main-navigation__list-item-count">{{ $project->tasks->count() }}</span>
                </li>
            @endforeach
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="{{ route('main.project.create') }}">Добавить проект</a>
</section>
