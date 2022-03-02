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
                                           @if(isset($data['name'])) value="{{ $data['name'] }}" @endif
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
                                           @if(isset($data['norm_nitrogen_from']))
                                           value="{{ $data['norm_nitrogen_from'] }}"
                                           @endif
                                           @if(isset($data['norm_nitrogen']))
                                           value="{{ $data['norm_nitrogen'][0] }}"
                                        @endif
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="до" id="norm_nitrogen_to" name="norm_nitrogen_to"
                                           aria-label="Конечное значение нормы (с точкой и двумя знаками)"
                                           @if(isset($data['norm_nitrogen_to']))
                                           value="{{ $data['norm_nitrogen_to'] }}"
                                           @endif
                                           @if(isset($data['norm_nitrogen']))
                                           value="{{ $data['norm_nitrogen'][1] }}"
                                        @endif
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
                                           @if(isset($data['norm_phosphorus_from']))
                                           value="{{ $data['norm_phosphorus_from'] }}"
                                           @endif
                                           @if(isset($data['norm_phosphorus']))
                                           value="{{ $data['norm_phosphorus'][0] }}"
                                        @endif
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="до" id="norm_phosphorus_to" name="norm_phosphorus_to"
                                           aria-label="Конечное значение нормы (с точкой и двумя знаками)"
                                           @if(isset($data['norm_phosphorus_to']))
                                           value="{{ $data['norm_phosphorus_to'] }}"
                                           @endif
                                           @if(isset($data['norm_phosphorus']))
                                           value="{{ $data['norm_phosphorus'][1] }}"
                                        @endif
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
                                           @if(isset($data['norm_potassium_from']))
                                           value="{{ $data['norm_potassium_from'] }}"
                                           @endif
                                           @if(isset($data['norm_potassium']))
                                           value="{{ $data['norm_potassium'][0] }}"
                                        @endif
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="до" id="norm_potassium_to" name="norm_potassium_to"
                                           aria-label="Конечное значение нормы (с точкой и двумя знаками)"
                                           @if(isset($data['norm_potassium_to']))
                                           value="{{ $data['norm_potassium_to'] }}"
                                           @endif
                                           @if(isset($data['norm_potassium']))
                                           value="{{ $data['norm_potassium'][1] }}"
                                        @endif
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
                                            id="cultures" name="culture_ids[]">
                                        @foreach($cultures as $culture)
                                            <option value="{{ $culture->id }}"
                                            @if(isset( $data['culture_ids'] ))
                                                {{ is_array( $data['culture_ids']) && in_array($culture->id, $data['culture_ids']) ? ' selected' : ''}}
                                                @endif
                                            >{{ $culture->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="districts">Район:</label>
                                    <select class="select2 form-control-sm" multiple="multiple"
                                            data-placeholder="Выбирите район"
                                            style="width: 100%;"
                                            id="districts" name="districts[]">>
                                        @foreach($districts as $district)
                                            <option value="{{ $district->district }}"
                                            @if(isset( $data['districts'] ))
                                                {{ $data['districts'][0] == $district->district ? ' selected' : '' }}
                                                @endif >
                                                {{ $district->district }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="costs">Стоимость:</label>
                                    <select class="select2 form-control-sm" multiple="multiple"
                                            data-placeholder="Выбирите стоимость"
                                            style="width: 100%;"
                                            id="costs" name="costs[]">>
                                        @foreach($costs as $cost)
                                            <option value="{{ $cost->cost }}"
                                            @if(isset( $data['costs'] ))
                                                {{ is_array( $data['costs']) && in_array($cost->cost, $data['costs']) ? ' selected' : ''}}
                                                @endif >
                                                {{ $cost->cost }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class=" col-sm-2">
                                <div class="form-group">
                                    <label for="sort">Сортировать по:</label>
                                    <select class="form-control form-control-sm" id="sort" name="sort">
                                        <option value="name"
                                        @if(isset( $data['sort'] ))
                                            {{ $data['sort'][0] == 'name' ? ' selected' : '' }}
                                            @endif
                                        >Наименование
                                        </option>
                                        <option value="cost"
                                        @if(isset( $data['sort'] ))
                                            {{ $data['sort'][0] == 'cost' ? ' selected' : '' }}
                                            @endif
                                        >Стоимость
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="order">Порядок сортировки:</label>
                                    <select class="form-control form-control-sm" id="order" name="order">
                                        <option value="asc"
                                        @if(isset( $data['sort'] ))
                                            {{ $data['sort'][1] == 'asc' ? ' selected' : '' }}
                                            @endif
                                        >По возрастанию
                                        </option>
                                        <option value="desc"
                                        @if(isset( $data['sort'] ))
                                            {{ $data['sort'][1] == 'desc' ? ' selected' : '' }}
                                            @endif
                                        >По убыванию
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group-append mt-3">
                                <button type="submit" class="btn btn-block btn-secondary rounded">
                                    <i class="">Поиск</i>
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

