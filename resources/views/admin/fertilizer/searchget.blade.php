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
                            <li class="breadcrumb-item"><a href="{{ route('admin.fertilizer.index') }}">Удобрения</a>
                            </li>
                            <li class="breadcrumb-item active">Поиск</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row mb-3">
                <div class="col-12">
                    <form method="POST" action="{{ route('admin.fertilizer.searchpost') }}">
                        @csrf
                        <div class="input-group">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name" class="text-center">Наименование:</label>
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="Наименование" id="name" name="name"
                                        {{--                                           @if(isset($_GET['name'])) value="{{$_GET['name']}}" @endif --}}
                                    >
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Норма Азот:</label>
                                <div class="input-group">
                                    <span class="input-group-text form-control-sm">0.00</span>
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="от" id="norm_nitrogen_from" name="norm_nitrogen_from"
                                           aria-label="Начальное значение нормы (с точкой и двумя знаками)"
                                        {{--                                           @if(isset($_GET['norm_nitrogen_from'])) value="{{$_GET['norm_nitrogen_from']}}" @endif --}}
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="до" id="norm_nitrogen_to" name="norm_nitrogen_to"
                                           aria-label="Конечное значение нормы (с точкой и двумя знаками)"
                                        {{--                                           @if(isset($_GET['norm_nitrogen_to'])) value="{{$_GET['norm_nitrogen_to']}}" @endif --}}
                                    >
                                    <span class="input-group-text form-control-sm">0.00</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Норма Фосфор:</label>
                                <div class="input-group">
                                    <span class="input-group-text form-control-sm">0.00</span>
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="от" id="norm_phosphorus_from" name="norm_phosphorus_from"
                                           aria-label="Начальное значение нормы (с точкой и двумя знаками)"
                                        {{--                                           @if(isset($_GET['norm_phosphorus_from'])) value="{{$_GET['norm_phosphorus_from']}}" @endif --}}
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="до" id="norm_phosphorus_to" name="norm_phosphorus_to"
                                           aria-label="Конечное значение нормы (с точкой и двумя знаками)"
                                        {{--                                           @if(isset($_GET['norm_phosphorus_to'])) value="{{$_GET['norm_phosphorus_to']}}" @endif --}}
                                    >
                                    <span class="input-group-text form-control-sm">0.00</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Норма Калий:</label>
                                <div class="input-group">
                                    <span class="input-group-text form-control-sm">0.00</span>
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="от" id="norm_potassium_from" name="norm_potassium_from"
                                           aria-label="Начальное значение нормы (с точкой и двумя знаками)"
                                        {{--                                           @if(isset($_GET['norm_potassium_from'])) value="{{$_GET['norm_potassium_from']}}" @endif --}}
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="до" id="norm_potassium_to" name="norm_potassium_to"
                                           aria-label="Конечное значение нормы (с точкой и двумя знаками)"
                                        {{--                                           @if(isset($_GET['norm_potassium_to'])) value="{{$_GET['norm_potassium_to']}}" @endif --}}
                                    >
                                    <span class="input-group-text form-control-sm">0.00</span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="cultures">Группа культур:</label>
                                    <select class="select2 form-control-sm" multiple="multiple"
                                            data-placeholder="Выбирите группу культур"
                                            style="width: 100%;"
                                            id="cultures" name="culture_ids[]">>
                                        @foreach($cultures as $culture)
                                            <option value="{{ $culture->id }}">
                                                {{ $culture->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--                                                        <option value="{{ $culture->culture }}"--}}
                            {{--                                                            {{ $culture->culture == old('culture') ? ' selected' : '' }}--}}
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="districts">Район:</label>
                                    <select class="select2 form-control-sm" multiple="multiple"
                                            data-placeholder="Выбирите район"
                                            style="width: 100%;"
                                            id="districts" name="districts[]">>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->district }}">
                                                {{ $district->district }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--                                                        <option value="{{ $district->district }}"--}}
                            {{--                                                            {{ $district->district == old('district') ? ' selected' : '' }}--}}
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="costs">Стоимость:</label>
                                    <select class="select2 form-control-sm" multiple="multiple"
                                            data-placeholder="Выбирите стоимость"
                                            style="width: 100%;"
                                            id="costs" name="costs[]">>
                                        @foreach($costs as $cost)
                                            <option value="{{ $cost->cost }}">
                                                {{ $cost->cost }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--                                                        <option value="{{ $cost->cost }}"--}}
                            {{--                                                            {{ $cost->cost == old('cost') ? ' selected' : '' }}--}}
                            <div class=" col-sm-2">
                                <div class="form-group">
                                    <label for="sort">Сортировать по:</label>
                                    <select class="form-control form-control-sm" id="sort" name="sort">
                                        <option value="name">Наименование</option>
                                        <option value="cost">Стоимость</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="order">Порядок сортировки:</label>
                                    <select class="form-control  form-control-sm" id="order" name="order">
                                        <option value="asc">По возрастанию</option>
                                        <option value="desc">По убыванию</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                    <th class="align-middle text-center" colspan="3">Действия</th>
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
                                        <td class="text-center">
                                            <a href="{{ route('admin.fertilizer.show', $fertilizer->id) }}">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.fertilizer.edit', $fertilizer->id) }}"
                                               class="text-success">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.fertilizer.delete', $fertilizer->id) }}"
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

