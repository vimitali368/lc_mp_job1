@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Клиенты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Админка</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.client.index') }}">Клиенты</a></li>
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
                    <form method="POST" action="{{ route('admin.client.searchpost') }}">
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
                                <div class="form-group">
                                    <label for="contract_date_from">Дата договора:</label>
                                    <input type="date" class="form-control form-control-sm"
                                           placeholder="от" id="contract_date_from" name="contract_date_from"
                                           @if(isset($data['contract_date_from']))
                                           value="{{ $data['contract_date_from'] }}"
                                           @endif
                                           @if(isset($data['contract_date']))
                                           value="{{ $data['contract_date'][0] }}"
                                        @endif >
                                    <input type="date" class="form-control form-control-sm"
                                           placeholder="до" id="contract_date_to" name="contract_date_to"
                                           @if(isset($data['contract_date_to']))
                                           value="{{ $data['contract_date_to'] }}"
                                           @endif
                                           @if(isset($data['contract_date']))
                                           value="{{ $data['contract_date'][1] }}"
                                        @endif >
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Стоимость поставки:</label>
                                <div class="input-group">
                                    <span class="input-group-text form-control-sm">0.00</span>
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="от" id="delivery_cost_from" name="delivery_cost_from"
                                           aria-label="Начальная стоимость поставки (с точкой и двумя знаками)"
                                           @if(isset($data['delivery_cost_from']))
                                           value="{{ $data['delivery_cost_from'] }}"
                                           @endif
                                           @if(isset($data['delivery_cost']))
                                           value="{{ $data['delivery_cost'][0] }}"
                                        @endif
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-sm"
                                           placeholder="до" id="delivery_cost_to" name="delivery_cost_to"
                                           aria-label="Конечная стоимость поставки (с точкой и двумя знаками)"
                                           @if(isset($data['delivery_cost_to']))
                                           value="{{ $data['delivery_cost_to'] }}"
                                           @endif
                                           @if(isset($data['delivery_cost']))
                                           value="{{ $data['delivery_cost'][1] }}"
                                        @endif
                                    >
                                    <span class="input-group-text form-control-sm">0.00</span>
                                </div>
                            </div>
                            {{--                            @if(isset($data['regions']))--}}
                            {{--                                @dd($data['regions'])--}}
                            {{--                            @endif--}}
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="regions">Регион:</label>
                                    <select class="select2 form-control-sm" multiple="multiple"
                                            data-placeholder="Выбирите регион"
                                            style="width: 100%;"
                                            id="regions" name="regions[]">>
                                        @foreach($regions as $region)
                                            <option
                                                @if(isset( $data['regions'] ))
                                                {{ is_array( $data['regions']) && in_array($region->region, $data['regions']) ? ' selected' : ''}}
                                                @endif
                                                value="{{ $region->region }}">
                                                {{ $region->region }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--                            @if(isset($data['sort']))--}}
                            {{--                                @dd($data['sort'][0])--}}
                            {{--                            @endif--}}
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
                                        <option value="delivery_cost"
                                        @if(isset( $data['sort'] ))
                                            {{ $data['sort'][0] == 'delivery_cost' ? ' selected' : '' }}
                                            @endif
                                        >Стоимость поставки
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
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Дата договора</th>
                                    <th>Стоимость поставки</th>
                                    <th>Регион</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->contract_date }}</td>
                                        <td>{{ $client->delivery_cost }}</td>
                                        <td>{{ $client->region }}</td>
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
