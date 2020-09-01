@extends('admin.layouts.glance')

@section('title')
    Sửa menu
@endsection

@section('content')

    <h1>Sửa menu {{$menus->id .' : '.$menus->name}}</h1>

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
            <form class="form-horizontal" name="menu" action="{{url('admin/menu/'.$menus->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên menu</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" value="{{$menus->name}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1" id="focusedinput" value="{{$menus->slug}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4"  class="form-control1 mytinymce">{{$menus->desc}}</textarea></div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-8">
                        <input type="text" name="location" value="{{$menus->location}}" class="form-control1" id="focusedinput" >
                    </div>

                </div>


                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Submit</button> </div>

            </form>
        </div>
    </div>
@endsection
