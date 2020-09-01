@extends('admin.layouts.glance')

@section('title')
    Xóa menu
@endsection

@section('content')

    <h1>Xóa menu {{$menus->id .' : '.$menus->name}}</h1>

    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="menu" action="{{url('admin/menu/'.$menus->id).'/delete'}}" method="post">
                @csrf

                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-danger">Xóa</button> </div>

            </form>
        </div>
    </div>
@endsection
