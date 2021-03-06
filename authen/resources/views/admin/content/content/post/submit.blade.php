@extends('admin.layouts.glance')

@section('title')
    Thêm bài viết
@endsection

@section('content')

    <h1>Thêm mới bài viết</h1>

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
            <form class="form-horizontal" name="post" action="{{url('admin/content/post')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" value="{{old('name')}}" id="focusedinput" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Danh mục</label>
                    <div class="col-sm-8">
                        <select name="cat_id">
                            <option value="">Không có danh mục</option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1" value="{{old('slug')}}" id="focusedinput" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-8">
                        <input type="text" name="images" class="form-control1" value="{{old('images')}}" id="focusedinput" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{old('intro')}}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{old('desc')}}</textarea></div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">author_id</label>
                    <div class="col-sm-8">
                        <input type="text" name="author_id" class="form-control1" value="{{old('author_id')}}" id="focusedinput" >
                    </div>

                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">view</label>
                    <div class="col-sm-8">
                        <input type="text" name="view" class="form-control1" value="{{old('view')}}" id="focusedinput" >
                    </div>

                </div>

                <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Submit</button> </div>

            </form>
        </div>
    </div>
@endsection
