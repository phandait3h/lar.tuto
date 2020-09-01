@extends('admin.layouts.glance')

@section('title')
    Xóa bài viết
@endsection

@section('content')

    <h1>Xóa bài viết {{$posts->id .' : '.$posts->name}}</h1>

    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="product" action="{{url('admin/content/post/'.$posts->id).'/delete'}}" method="post">
                @csrf

                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-danger">Xóa</button> </div>

            </form>
        </div>
    </div>
@endsection
