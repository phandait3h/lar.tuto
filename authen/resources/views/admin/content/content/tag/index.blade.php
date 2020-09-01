@extends('admin.layouts.glance')

@section('title')
    Quản lí tag
@endsection

@section('content')

    <h1>Quản lí tag</h1>
    <div style="margin: 20px 0">
        <a href="{{url('admin/content/tag/create')}}" class="btn btn-success">Thêm trang</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng :</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên tag</th>
                    <th>Slug</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả ngắn</th>
                    <th>view</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>{{$tag->images}}</td>
                        <td>{{$tag->intro}}</td>
                        <td>{{$tag->view}}</td>
                        <td>
                            <a href="{{url('admin/content/tag/'.$tag->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/content/tag/'.$tag->id.'/delete ')}}" class="btn btn-danger">Xóa</a>
                        </td>


                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $tags->links() }}
        </div>
    </div>
@endsection
