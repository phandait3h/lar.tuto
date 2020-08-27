@extends('admin.layouts.glance')

@section('title')
    Quản trị danh mục
@endsection

@section('content')

   <h1>Quản trị danh mục</h1>
   <div style="margin: 20px 0">
       <a href="{{url('admin/shop/category/create')}}" class="btn btn-success">Thêm danh mục</a>
   </div>
   <div class="tables">
       <div class="table-responsive bs-example widget-shadow">
           <h4>Tổng :</h4>
           <table class="table table-bordered">
               <thead>
               <tr>
                   <th>#</th>
                   <th>Tên</th>
                   <th>Slug</th>
                   <th>Hình ảnh</th>
                   <th>Mô tả ngắn</th>
                   <th>Mô tả</th>

               </tr>
               </thead>
               <tbody>
               @foreach($cats as $cat)
               <tr>
                   <th scope="row">{{$cat->id}}</th>
                   <td>{{$cat->name}}</td>
                   <td>{{$cat->slug}}</td>
                   <td>{{$cat->images}}</td>
                   <td>{{$cat->intro}}</td>
                   <td>{{$cat->desc}}</td>

               </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
   </div>
@endsection
