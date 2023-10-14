<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview">
            <li class="nav-item">
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Главная</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Пользователи</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.task.index')}}" class="nav-link">
                    <i class="nav-icon far fa-clipboard"></i>
                    <p>Задачи</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.project.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>Проекты</p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
