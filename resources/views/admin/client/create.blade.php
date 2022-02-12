@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление клиента</h1>
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
                <form action="{{ route('admin.client.store') }}" method="POST" class="w-25">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Наименование">
                        @error('name')
                        <div class="text-danger">
                            Это поле необходимо для заполнения
                        </div>
                        @enderror
                    </div>
                    <input type="text" class="form-control" name="contract_date" placeholder="Дата договора">
{{--                    <div class="form-group">--}}
{{--                        <label>Дата договора:</label>--}}
{{--                        <div class="input-group date" id="contract_date" data-target-input="nearest">--}}
{{--                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">--}}
{{--                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">--}}
{{--                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="delivery_cost" placeholder="Стоимость поставки">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="region" placeholder="Регион">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
