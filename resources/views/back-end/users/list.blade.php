@extends('back-end.layouts.master')

@section('title')
    Quản lý Admin
@endsection

@section('breadcrumb')
    <li><a href="#">Trang chủ</a></li>
    <li>Người Dùng</li>
@endsection

@section('content')
    <!-- main content  -->
    <div>
        <div class='col-xs-12 col-md-6'>
            <a class='btn btn-primary' role='button' href="{{ route('getaddUsers') }}">
                <span class='glyphicon glyphicon-plus'></span> Thêm mới
            </a>
        </div>
    </div>

    <table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Ngày tạo</th>
        <th>Chức vụ</th>
        <th>Số TK</th>
        <th>Hành động</th>
    </tr>
    </thead>
        <tbody>
            @if(count($list) < 1)
                <tr>
                    <td colspan="4">Chưa có dữ liệu</td>
                </tr>
            @else
                @foreach($list as $row)
                    <tr>
                        <td>{!! $row->id !!}</td>
                        <td>{!! $row->username !!}</td>
                        <td>{!! $row->created_at !!}</td>
                        <td>@if($row->level == 1) Admin @else Người chơi @endif</td>
                        <td>{!! $row->sotk !!}</td>
                        <td>
                            <a href="{!! url('admin/user/sua-thong-tin/'.$row->id) !!}"
                               class="btn btn-warning">
                                <span class="glyphicon glyphicon-edit"></span>
                                Sửa
                            </a>
                            <button type='button' class="btn btn-danger btn-del" frm-id='{{$row->id}}' link='{!! url('admin/user/xoa') !!}'>
                                <span class="glyphicon glyphicon-remove"></span>
                                Xóa
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
</table>
@endsection
