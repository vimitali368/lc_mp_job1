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
                    <form action="{{ route('admin.client.search') }}">
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
                            {{--                            <input type="search" class="form-control form-control-lg" placeholder="Регион" id="s_name" name="s_name">--}}
                            {{--                            <div class="col-6" data-select2-id="33">--}}
                            {{--                                <div class="form-group" data-select2-id="32">--}}
                            {{--                                    <label>Регион:</label>--}}
                            {{--                                    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Any" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">--}}
                            {{--                                        <option data-select2-id="23">Text only</option>--}}
                            {{--                                        <option data-select2-id="24">Images</option>--}}
                            {{--                                        <option data-select2-id="25">Video</option>--}}
                            {{--                                    </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Any" style="width: 422.25px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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
