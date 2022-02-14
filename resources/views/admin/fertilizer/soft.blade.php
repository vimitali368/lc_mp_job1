@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Удобрения</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.fertilizer.index') }}">Удобрения</a>
                            </li>
                            <li class="breadcrumb-item active">Список удалённых</li>
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
                                    <th class="align-middle">ID</th>
                                    <th class="align-middle">Наименование</th>
                                    <th class="text-wrap">Норма Азот</th>
                                    <th class="text-wrap">Норма Фосфор</th>
                                    <th class="text-wrap">Норма Калий</th>
                                    <th class="text-wrap">Группа культур</th>
                                    <th class="align-middle">Район</th>
                                    <th class="align-middle">Стоимость</th>
                                    <th class="align-middle">Описание</th>
                                    <th class="align-middle">Назначение</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fertilizers as $fertilizer)
                                    <tr>
                                        <td>{{ $fertilizer->id }}</td>
                                        <td>{{ $fertilizer->name }}</td>
                                        <td>{{ $fertilizer->norm_nitrogen }}</td>
                                        <td>{{ $fertilizer->norm_phosphorus }}</td>
                                        <td>{{ $fertilizer->norm_potassium }}</td>
                                        <td>{{ $fertilizer->culture_id }}</td>
                                        <td>{{ $fertilizer->district }}</td>
                                        <td>{{ $fertilizer->cost }}</td>
                                        <td>{{ $fertilizer->description }}</td>
                                        <td>{{ $fertilizer->appointment }}</td>
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
