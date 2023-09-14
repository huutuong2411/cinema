@extends('Admin.layout.main')

@section('title')
Suất chiếu - thùng rác
@endsection

@section('content')

<h1 class="h3 mb-2 text-gray-800  border-bottom bg-white mb-4"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Suất chiếu - thùng rác</h1>

<div class="card shadow mb-4">
    <div class="card">
        <div class="card-header text-primary font-weight-bold">Danh sách danh mục đã xoá<a style="float: right;" href="{{route('admin.categories')}}" class="btn btn-danger"><i class="fas fa-sharp fa-solid fa-arrow-left"></i> Quay lại</a></div>
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th class="col-1">ID</th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Ngày</th>
                        <th class="col-2" style="text-align: center">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($trash as $value)
                    <tr>
                        <th scope="row">{{$value->id}}</th>
                        <td class="name">{{$value->end_at}}</td>
                        <td class="name">{{$value->date}}</td>
                        <td style="text-align: center">
                            <a href="{{route('admin.showtime_restore',['id'=>$value->id])}}" class="btn btn-warning"><i class="fas fa-retweet"></i> Khôi phục</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection