@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Группа культур</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item active">Группа культур / Список</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-2 mb-3">
                    <a href="{{ route('admin.culture.create') }}" type="button" class="btn btn-block btn-primary">Добавить</a>
                </div>
                <div class="col-2 mb-3">
                    <a href="{{ route('admin.culture.soft') }}" type="button"
                       class="btn btn-block btn-info">Удалённые</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th colspan="3" class="text-center">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cultures as $culture)
                                    <tr>
                                        <td>{{ $culture->id }}</td>
                                        <td>{{ $culture->name }}</td>
                                        <td class="text-center"><a
                                                href="{{ route('admin.culture.show', $culture->id) }}"><i
                                                    class="far fa-eye"></i></a></td>
                                        <td class="text-center"><a
                                                href="{{ route('admin.culture.edit', $culture->id) }}"
                                                class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.culture.delete', $culture->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
