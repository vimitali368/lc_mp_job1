@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование удобрения</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.fertilizer.index') }}">Удобрения</a>
                            </li>
                            <li class="breadcrumb-item active">Редактирование</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row ml-1">
                <form action="{{ route('admin.fertilizer.update', $fertilizer->id ) }}" method="POST" class="w-25">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Наименование"
                               value="{{ $fertilizer->name }}">
                        @error('name')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="norm_nitrogen" placeholder="Норма Азот"
                               value="{{ $fertilizer->norm_nitrogen }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="norm_phosphorus" placeholder="Норма Фосфор"
                               value="{{ $fertilizer->norm_phosphorus }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="norm_potassium" placeholder="Норма Калий"
                               value="{{ $fertilizer->norm_potassium }}">
                    </div>
                    <div class="form-group">
                        <label>Выбирите группу культур</label>
                        <select name="culture_id" class="form-control" value="{{ $fertilizer->culture_id }}">
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}"
                                    {{ $culture->id == old('culture_id') ? ' selected' : '' }}
                                >{{ $culture->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="district" placeholder="Район"
                               value="{{ $fertilizer->district }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="cost" placeholder="Стоимость"
                               value="{{ $fertilizer->cost }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Описание"
                               value="{{ $fertilizer->description }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="appointment" placeholder="Назначение"
                               value="{{ $fertilizer->appointment }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
