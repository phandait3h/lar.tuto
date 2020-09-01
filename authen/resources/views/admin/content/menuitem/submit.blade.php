@extends('admin.layouts.glance')

@section('title')
    Thêm menuitem
@endsection

@section('content')

    <h1>Thêm mới menuitem</h1>

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
            <form class="form-horizontal" name="menuitem" action="{{url('admin/menuitems')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên menu item</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" value="{{old('type')}}" id="focusedinput" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">kiểu menu item</label>
                    <div class="col-sm-8">
                        <select name="type">
                            @foreach($types as $type_id => $type)
                                <option value="{{$type_id}}">{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">link</label>
                    <div class="col-sm-8">
                        <input type="text" name="link" class="form-control1" value="{{old('link')}}" id="focusedinput" >
                    </div>

                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">cha</label>
                    <div class="col-sm-8">
                        <select name="parent_id">
                            <option value="0"></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">thuộc menu</label>
                    <div class="col-sm-8">
                        <select name="menu_id">
                            @foreach($menu_items as $menu_item)
                                <option value="{{ $menu_item->id }}">{{ $menu_item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">icon</label>
                    <div class="col-sm-8">
                        <input type="text" name="icon" class="form-control1" value="{{old('icon')}}" id="focusedinput" >
                    </div>

                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{old('desc')}}</textarea></div>
                </div>

                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Submit</button> </div>

            </form>
        </div>
    </div>
@endsection
