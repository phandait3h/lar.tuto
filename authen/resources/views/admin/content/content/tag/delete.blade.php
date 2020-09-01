@extends('admin.layouts.glance')

@section('title')
    Xóa tag
@endsection

@section('content')

    <h1>Xóa tag {{$tags->id .' : '.$tags->name}}</h1>

    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="tag" action="{{url('admin/content/tag/'.$tags->id).'/delete'}}" method="post">
                @csrf

                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-danger">Xóa</button> </div>

            </form>
        </div>
    </div>
@endsection
