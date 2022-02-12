@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $fertilizer->name }}</h1>
                        <a href="{{ route('admin.fertilizer.edit', $fertilizer->id) }}" class="text-success">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('admin.fertilizer.delete', $fertilizer->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $fertilizer->id }}</td>
                                </tr>
                                <tr>
                                    <td>Наименование</td>
                                    <td>{{ $fertilizer->name }}</td>
                                </tr>
                                <tr>
                                    <td>Норма Азот</td>
                                    <td>{{ $fertilizer->norm_nitrogen }}</td>
                                </tr>
                                <tr>
                                    <td>Норма Фосфор</td>
                                    <td>{{ $fertilizer->norm_phosphorus }}</td>
                                </tr>
                                <tr>
                                    <td>Норма Калий</td>
                                    <td>{{ $fertilizer->norm_potassium }}</td>
                                </tr>
                                <tr>
                                    <td>Группа культур</td>
                                    <td>{{ $fertilizer->culture_id }}</td>
                                </tr>
                                <tr>
                                    <td>Район</td>
                                    <td>{{ $fertilizer->district }}</td>
                                </tr>
                                <tr>
                                    <td>Стоимость</td>
                                    <td>{{ $fertilizer->cost }}</td>
                                </tr>
                                <tr>
                                    <td>Описание</td>
                                    <td>{{ $fertilizer->description }}</td>
                                </tr>
                                <tr>
                                    <td>Назначение</td>
                                    <td>{{ $fertilizer->appointment }}</td>
                                </tr>

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
