@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование культуры</h1>
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
            <div class="row ml-3">
                <form action="{{ route('admin.culture.update', $culture->id ) }}" method="POST" class="w-25">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Наименование" value="{{ $culture->name }}">
                        @error('name')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Обновить">
                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
