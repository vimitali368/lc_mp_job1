@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление удобрения</h1>
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
                <form action="{{ route('admin.fertilizer.store') }}" method="POST" class="w-25">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Наименование">
                        @error('name')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                        <input type="text" class="form-control" name="norm_nitrogen" placeholder="Норма Азот">
                        <input type="text" class="form-control" name="norm_phosphorus" placeholder="Норма Фосфор">
                        <input type="text" class="form-control" name="norm_potassium" placeholder="Норма Калий">
                        <input type="text" class="form-control" name="culture_id" placeholder="Группа культур">
                        <input type="text" class="form-control" name="district" placeholder="Район">
                        <input type="text" class="form-control" name="cost" placeholder="Стоимость">
                        <input type="text" class="form-control" name="description" placeholder="Описание">
                        <input type="text" class="form-control" name="appointment" placeholder="Назначение">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
