@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Задачи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Задачи</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form class="search-form" action="{{ route('admin.task.index') }}" autocomplete="off" method="GET">
                    <input class="search-form__input" type="text" name="title" placeholder="Название задачи" value="{{ request()->get('title') }}">
                    <input class="btn-primary mb-4" type="submit" value="Поиск">
                </form>
                <div class="row w-100">
                    <div class="col-12">
                            <div class="card">

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Название</th>
                                            <th>Проект</th>
                                            <th>Дата выполнения</th>
                                            <th colspan="4" class="text-center">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tasks as $task)
                                            <tr>
                                                <td>{{ $task->id }}</td>
                                                <td>{{ $task->title }}</td>
                                                <td>{{ $task->project->title }}</td>
                                                <td>{{ \Carbon\Carbon::parse($task->deadline)->format('d.m.Y') }}</td>
                                                <td class="text-center"> <a href="{{ route('admin.task.show', $task->id) }}"><i class="far fa-eye"></i></a></td>
                                                <td class="text-center"> <a href="{{ route('admin.task.edit', $task->id) }}" class="text-success"><i class="fas fa-edit"></i></a></td>
                                                <td class="text-center">
                                                    <form action="{{ route('admin.task.delete', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{ $tasks->withQueryString()->links() }}
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{ route('admin.task.create') }}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
