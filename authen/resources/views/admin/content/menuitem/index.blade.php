@extends('admin.layouts.glance')

@section('title')
    Quản trị menu_item
@endsection

@section('content')

    <h1>Quản trị menu_item</h1>
    <div style="margin: 20px 0">
        <a href="{{url('admin/menuitems/create')}}" class="btn btn-success">Thêm menuitem</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng :</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên tag</th>
                    <th>parent</th>
                    <th>menu</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($menu_items as $menu_item)
                    <tr>
                        <th scope="row">{{$menu_item->id}}</th>
                        <td>{{$menu_item->name}}</td>
                        <td>{{$menu_item->menu_id}}</td>
                        <td>{{$menu_item->parent_id}}</td>
                        <td>
                            <a href="{{url('admin/menuitems/'.$menu_item->id.'/edit')}}" class="btn btn-warning">Sửa</a>
                            <a href="{{url('admin/menuitems/'.$menu_item->id.'/delete ')}}" class="btn btn-danger">Xóa</a>
                        </td>


                    </tr>
                @endforeach
                </tbody>

            </table>
            {{ $menu_items->links() }}
        </div>
    </div>
@endsection
