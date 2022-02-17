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
                    <h2 class="text-center display-4">Расширенный поиск</h2>
                    <form method="GET" action="{{ route('admin.client.search') }}">
                        <div class="input-group">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="text-center">Наименование:</label>
                                    <input type="search" class="form-control form-control-lg"
                                           placeholder="Наименование" id="name" name="name"
                                           @if(isset($_GET['name'])) value="{{$_GET['name']}}" @endif >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Дата договора:</label>
                                    <input type="date" class="form-control form-control-lg"
                                           placeholder="от" id="contract_date_from" name="contract_date_from"
                                           @if(isset($_GET['contract_date_from'])) value="{{$_GET['contract_date_from']}}" @endif >
                                    <input type="date" class="form-control form-control-lg"
                                           placeholder="до" id="contract_date_to" name="contract_date_to"
                                           @if(isset($_GET['contract_date_to'])) value="{{$_GET['contract_date_to']}}" @endif >
                                </div>
                            </div>
                            <div class="bd-example col-2">
                                <label>Стоимость поставки:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">0.00</span>
                                    <input type="search" class="form-control"
                                           aria-label="Начальная стоимость поставки (с точкой и двумя знаками)">
                                </div>
                                <div class="input-group">
                                    <input type="search" class="form-control"
                                           aria-label="Конечная стоимость поставки (с точкой и двумя знаками)">
                                    <span class="input-group-text">0.00</span>
                                </div>
                            </div>
                            <div class="col-2">
                                <label>Стоимость поставки:</label>
                                <div class="form-group">
                                    <input type="search" class="form-control form-control-lg"
                                           placeholder="от" id="delivery_cost_from" name="delivery_cost_from"
                                           @if(isset($_GET['delivery_cost_from'])) value="{{$_GET['delivery_cost_from']}}" @endif >
                                    <input type="search" class="form-control form-control-lg"
                                           placeholder="до" id="delivery_cost_to" name="delivery_cost_to"
                                           @if(isset($_GET['delivery_cost_to'])) value="{{$_GET['delivery_cost_to']}}" @endif >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Регион:</label>
                                    <select multiple="" class="form-control">
                                        @foreach($regions as $region)
                                            <option>option 1</option>
                                            <option value="{{ $region->id }}"
                                                {{ $culture->id == old('culture_id') ? ' selected' : '' }}
                                            >{{ $culture->name }}</option>
                                        @endforeach
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
