@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление задачи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.task.index') }}">Проекты</a></li>
                            <li class="breadcrumb-item active">Добавление задачи</li>
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
                <div class="row">
                    <div class="col-12">
                    <form class="w-50" action="{{ route('admin.task.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Название задачи" name="title"
                            value="{{ old('title') }}"
                            >
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Дата выполнения</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="deadline"
                                           value="{{ old('deadline') }}">
                                </div>
                                @error('deadline')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputFile">Добавить файл</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file">
                                            <label class="custom-file-label">Выберите файл</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузка</span>
                                        </div>
                                    </div>
                                    @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Выберите проект</label>
                                    <select name="project_id" class="form-control">
                                        @foreach($projects as $project)
                                        <option value="{{ $project->id }}"
                                          {{ $project->id == old('project_id') ? 'selected' : ''}}
                                        >{{ $project->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                    </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
