@extends('admin.layouts.glance')

@section('title')
    Xóa menuitem
@endsection

@section('content')

    <h1>Xóa menuitem {{$menu_items->id .' : '.$menu_items->name}}</h1>

    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="menuitem" action="{{url('admin/menuitems/'.$menu_items->id).'/delete'}}" method="post">
                @csrf

                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-danger">Xóa</button> </div>

            </form>
        </div>
    </div>
@endsection
