@extends('admin.layouts.glance')

@section('title')
    Sửa tag
@endsection

@section('content')

    <h1>Sửa tag {{$tags->id .' : '.$tags->name}}</h1>

    <div class="row">
        <div class="form-three widget-shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" name="tag" action="{{url('admin/content/tag/'.$tags->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên trang</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" value="{{$tags->name}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1" id="focusedinput" value="{{$tags->slug}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-8">
                        <input type="text" name="images" class="form-control1" id="focusedinput" value="{{$tags->images}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4"  class="form-control1 mytinymce">{{$tags->intro}}</textarea></div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">author_id</label>
                    <div class="col-sm-8">
                        <input type="text" name="author_id" value="{{$tags->author_id}}" class="form-control1 " id="focusedinput" >
                    </div>

                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">view</label>
                    <div class="col-sm-8">
                        <input type="text" name="view" value="{{$tags->view}}" class="form-control1" id="focusedinput" >
                    </div>

                </div>


                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Submit</button> </div>

            </form>
        </div>
    </div>
@endsection
