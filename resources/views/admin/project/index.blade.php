@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Проекты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Проекты</li>
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

                <form class="search-form" action="{{ route('admin.project.index') }}" autocomplete="off" method="GET">
                    <input class="search-form__input" type="text" name="title" placeholder="Название проекта" value="{{ request()->get('title') }}">
                    <input class="btn-primary mb-4" type="submit" value="Поиск">
                </form>
                <div class="row">
                    <div class="col-6">
                            <div class="card">

                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>
                                                Название
                                                <a href="{{ route('admin.project.index', ['sort' => 'asc'])}}">↑</a>
                                                <a href="{{ route('admin.project.index', ['sort' => 'desc'])}}">↓</a>
                                            </th>
                                            <th colspan="3" class="text-center">Действие</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                <td>{{ $project->title }}</td>
                                                <td class="text-center"> <a href="{{ route('admin.project.show', $project->id) }}"><i class="far fa-eye"></i></a></td>
                                                <td class="text-center"> <a href="{{ route('admin.project.edit', $project->id) }}" class="text-success"><i class="fas fa-edit"></i></a></td>
                                                <td class="text-center">
                                                    <form action="{{ route('admin.project.delete', $project->id) }}" method="POST">
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
                                        {{ $projects->withQueryString()->links() }}
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
                        <a href="{{ route('admin.project.create') }}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
