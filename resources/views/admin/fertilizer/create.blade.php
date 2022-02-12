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
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="norm_nitrogen" placeholder="Норма Азот">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="norm_phosphorus" placeholder="Норма Фосфор">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="norm_potassium" placeholder="Норма Калий">
                    </div>
                    <div class="form-group">
                        <label>Выбирите группу культур</label>
                        <select name="culture_id" class="form-control">
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}"
                                    {{ $culture->id == old('culture_id') ? ' selected' : '' }}
                                >{{ $culture->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="district" placeholder="Район">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="cost" placeholder="Стоимость">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="appointment" placeholder="Назначение">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
