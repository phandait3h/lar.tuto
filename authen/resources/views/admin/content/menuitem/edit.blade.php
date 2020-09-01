@extends('admin.layouts.glance')

@section('title')
    Sửa menuitem
@endsection

@section('content')

    <h1>Sửa menuitem {{$menu_items->id .' : '.$menu_items->name}}</h1>

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
            <form class="form-horizontal" name="menuitem" action="{{url('admin/menuitems/'.$menu_items->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên menuitem</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" value="{{$menu_items->name}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">type</label>
                    <div class="col-sm-8">
                        <input type="text" name="type" class="form-control1" id="focusedinput" value="{{$menu_items->type}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">parrams</label>
                    <div class="col-sm-8">
                        <input type="text" name="parrams" value="{{$menu_items->parrams}}" class="form-control1" id="focusedinput" >
                    </div>

                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">link</label>
                    <div class="col-sm-8">
                        <input type="text" name="link" value="{{$menu_items->link}}" class="form-control1" id="focusedinput" >
                    </div>

                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">icon</label>
                    <div class="col-sm-8">

                        <input type="text" name="icon" value="{{$menu_items->icon}}" class="form-control1" id="focusedinput" >
                    </div>

                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4"  class="form-control1 mytinymce">{{$menu_items->desc}}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">parent_id</label>
                    <div class="col-sm-8">
                        <input type="text" name="parent_id" value="{{$menu_items->parent_id}}" class="form-control1" id="focusedinput" >
                    </div>

                </div>


                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Submit</button> </div>

            </form>
        </div>
    </div>
@endsection
