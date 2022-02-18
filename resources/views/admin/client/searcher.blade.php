@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row mb-3">
                <div class="col-12">
                    <form method="POST" action="{{ route('admin.client.searcher') }}">
                        <div class="input-group">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name" class="text-center">Наименование:</label>
                                    <input type="search" class="form-control form-control-lg"
                                           placeholder="Наименование" id="name" name="name"
{{--                                           @if(isset($_GET['name'])) value="{{$_GET['name']}}" @endif --}}
                                    >
                                </div>
                            </div>
                            <div class="col-2">
                                <label>Стоимость поставки:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">0.00</span>
                                    <input type="search" class="form-control"
                                           placeholder="от" id="delivery_cost_from" name="delivery_cost_from"
                                           aria-label="Начальная стоимость поставки (с точкой и двумя знаками)"
{{--                                           @if(isset($_GET['delivery_cost_from'])) value="{{$_GET['delivery_cost_from']}}" @endif --}}
                                    >
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control"
                                           placeholder="до" id="delivery_cost_to" name="delivery_cost_to"
                                           aria-label="Конечная стоимость поставки (с точкой и двумя знаками)"
{{--                                           @if(isset($_GET['delivery_cost_to'])) value="{{$_GET['delivery_cost_to']}}" @endif --}}
                                    >
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="regions">Регион:</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Выбирите регион"
                                            style="width: 100%;"
                                            id="regions" name="regions[]">>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->region }}">
                                                {{ $region->region }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--                                        <div class=" col-sm-3">--}}
                            {{--                                            <div class="form-group">--}}
                            {{--                                                <label for="region">Регион:</label>--}}
                            {{--                                                <select multiple="multiple" class="form-control"--}}
                            {{--                                                        id="region" name="region[]">--}}
                            {{--                                                    @foreach($regions as $region)--}}
                            {{--                                                        <option value="{{ $region->region }}"--}}
                            {{--                                                            {{ $region->region == old('region') ? ' selected' : '' }}--}}
                            {{--                                                        >{{ $region->region }}</option>--}}
                            {{--                                                    @endforeach--}}
                            {{--                                                </select>--}}
                            {{--                                            </div>--}}
                            {{--                                                </div>--}}
                            <div class=" col-sm-3">
                                <div class="form-group">
                                    <label for="sort">Сортировать по:</label>
                                    <select class="form-control" id="sort" name="sort">
                                        <option value="name">Наименование</option>
                                        <option value="delivery_cost">Стоимость поставки</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="order">Порядок сортировки:</label>
                                    <select class="form-control" id="order" name="order">
                                        <option value="asc">По возрастанию</option>
                                        <option value="desc">По убыванию</option>
                                    </select>
                                </div>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
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
