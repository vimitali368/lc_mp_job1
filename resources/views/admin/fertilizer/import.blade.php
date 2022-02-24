@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Импорт удобрения из Excel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.fertilizer.index') }}">Удобрения</a>
                            </li>
                            <li class="breadcrumb-item active">Импорт</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row ml-3">
                <form action="{{ route('admin.fertilizer.excel') }}" method="POST" class="w-100" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-6">
                        <label>Файл для импорта</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="excel_input_file">
                                <label class="custom-file-label">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                            @error('excel_input_file')
                            <div class="text-danger">
                                Это поле необходимо для заполнения
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Импорт">
                    </div>
                </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
