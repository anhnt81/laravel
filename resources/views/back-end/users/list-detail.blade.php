@extends('back-end.layouts.master')
@section('content')
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
                <td>{!! $row->level !!}</td>
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
<!-- pagination -->
<hr>
<!-- {{--<div style='padding: 0 40px;'>--}}
    {{--@if($total > 0)--}}
        {{--<div style='float:left;'>--}}
            {{--Hiển thị : {{ $start }} <span class='glyphicon glyphicon-arrow-right'></span> {{ $end }}--}}
            {{--Trong {{ $total }} Người dùng.--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--{!! $list->links() !!}--}}
{{--</div>--}} -->