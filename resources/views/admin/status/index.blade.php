@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Статусы импорта</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item active">Статусы импорта / Список</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-sm">
                                <thead>
                                <tr>
                                    <th class="text-center col-1">ID</th>
                                    <th class="text-center col-1">Статус</th>
                                    <th class="text-center col-1">Пользователь</th>
                                    <th class="text-center col-7">Данные</th>
                                    <th class="text-center col-2">Дата создания</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($statuses as $status)
                                    <tr>
                                        <td class="text-center">{{ $status->id }}</td>
                                        <td class="text-center">{{ $status->status }}</td>
                                        <td class="text-center">{{ $status->user_id }}</td>
                                        <td >{{ $status->jsonb }}</td>
                                        <td class="text-center">{{ $status->created_at }}</td>
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
