@extends('back-end.layouts.master')

@section('title')
    Quản lý Admin
@endsection

@section('breadcrumb')
    <li><a href="#">Trang chủ</a></li>
    <li>Admin</li>
@endsection

@section('content')
    <!-- main content  -->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Danh sách khách hàng</h3>
        </div>
        <div class="panel-body">
            <!-- filter -->
            <div>
                <div class='col-xs-12 col-md-6'>
                    <button class="btn btn-primary" role='button' data-toggle='modal' data-target='#filter-modal'>
                        <span class='glyphicon glyphicon-filter'></span> Lọc
                    </button>
                </div>

                <form role='form' class='form-horizontal col-xs-12 col-md-6'>
                    <div class='form-group'>
                        <label for='per' class='col-xs-5 col-md-3 col-md-offset-6' style='margin-top : 10px; text-align: right'>Hiển thị</label>
                        <div class='col-xs-7 col-md-3'>
                            <select name='per' class='form-control form-val' id='per'>
                                {{--<option value='5' @if($data['per'] == 5) selected @endif>5</option>--}}
                            </select>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <hr>
            <!-- list -->
            <div class="table-responsive" id='list-data'>
                {{--@if(!empty(session('success')))--}}
                    {{--<div class='alert alert-success'>{{session('success')}}</div>--}}
                {{--@endif--}}
                {{--<table class="table table-hover table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>ID</th>--}}
                        {{--<th>Tên</th>--}}
                        {{--<th>Giới tính</th>--}}
                        {{--<th>Số điện thoại</th>--}}
                        {{--<th>E-mail</th>--}}
                        {{--<th>Địa chỉ giao hàng</th>--}}
                        {{--<th>Hành động</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@if(count($list) < 1)--}}
                        {{--<tr>--}}
                            {{--<td colspan="7">Chưa có dữ liệu</td>--}}
                        {{--</tr>--}}
                    {{--@else--}}
                        {{--@foreach($list as $row)--}}
                            {{--<tr>--}}
                                {{--<td>{!! $row->id !!}</td>--}}
                                {{--<td>{!! $row->name !!}</td>--}}
                                {{--<td>--}}
                                    {{--@if($row->gender == 1) Nam--}}
                                    {{--@elseif($row->gender == 2) Nữ--}}
                                    {{--@else Khác--}}
                                    {{--@endif--}}
                                {{--</td>--}}
                                {{--<td>{!! $row->phone !!}</td>--}}
                                {{--<td>{!! $row->email !!}</td>--}}
                                {{--<td>{!! $row->address !!}</td>--}}
                                {{--<td>--}}
                                    {{--<a href="{!! url('admin/customer/sua-thong-tin/'.$row->id) !!}"--}}
                                       {{--class="btn btn-warning">--}}
                                        {{--<span class="glyphicon glyphicon-edit"></span>--}}
                                        {{--Sửa--}}
                                    {{--</a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                    {{--@endif--}}
                    </tbody>
                </table>
                <!-- pagination -->
                <hr>
                <div style='padding: 0 40px;'>
                        {{--@if($total > 0)--}}
                            {{--<div style='float:left;'>--}}
                                {{--Hiển thị : {{ $start }} <span class='glyphicon glyphicon-arrow-right'></span> {{ $end }}--}}
                                {{--Trong {{ $total }} Khách hàng.--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    {{--{!! $list->list() !!}--}}
                </div>
            </div>
        </div>
    </div>
    <!-- ===================================== -->

    <!-- modal filter -->
    <div id='filter-modal' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h3>Lọc khách hàng</h3>
                </div>

                <div class='modal-body'>
                    <form method='get' action='{!! url('admin/customer/filter') !!}' role='form' id='filter-cus-frm'>
                        <!-- search -->
                        <div class='form-group'>
                            <label for='search-cus'>Tìm kiếm</label>
                            <div id='search-cus'>
                                <input type='search' name='search' class='form-control form-val'
                                       style='width : 60%; float:left; margin-right: 10px'
                                       value='<?php if (isset($data['key'])) echo $data['key'] ?>'
                                       placeholder='Nhập từ khóa'>
                                <select name='field_search' style='width : 35%' class='form-control form-val'>
                                    <option value='name'
                                            @if(isset($data['field']) && $data['field'] == 'name') selected @endif>Theo
                                        tên
                                    </option>
                                    <option value='email'
                                            @if(isset($data['field']) && $data['field'] == 'email') selected @endif>Theo
                                        email
                                    </option>
                                    <option value='address'
                                            @if(isset($data['field']) && $data['field'] == 'address') selected @endif>
                                        Theo địa chỉ
                                    </option>
                                    <option value='phone'
                                            @if(isset($data['field']) && $data['field'] == 'phone') selected @endif>Theo
                                        số điện thoại
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- sort -->
                        <div class='form-group'>
                            <label for='sort-cus'>Sắp xếp</label>
                            <div id='sort-cus' class='form-control-static sort-frm'>
                                <div class='form-group'>
                                    <label for='feild-sort'>Sắp xếp theo :</label>
                                    <div id='feild-sort' class='form-control-static'>
                                        <div class='col-xs-6 col-md-2'>
                                            <input type='radio' name='sort' value='name' class='form-val'
                                            <?php if (isset($data['sort']) && $data['sort'] == 'name') echo 'checked'?>>
                                            Tên
                                        </div>
                                        <div class='col-xs-6 col-md-2'>
                                            <input type='radio' name='sort' value='id' class='form-val'
                                            <?php if (empty($data['sort']) || (isset($data['sort']) && $data['sort'] == 'id')) echo 'checked'?>>
                                            ID
                                        </div>
                                        <div class='col-xs-6 col-md-2'>
                                            <input type='radio' name='sort' value='email' class='form-val'
                                            <?php if (isset($data['sort']) && $data['sort'] == 'email') echo 'checked'?>>
                                            E-mail
                                        </div>
                                        <div class='col-xs-6 col-md-3'>
                                            <input type='radio' name='sort' value='address' class='form-val'
                                            <?php if (isset($data['sort']) && $data['sort'] == 'address') echo 'checked'?>>
                                            Địa chỉ
                                        </div>
                                        <div class='col-xs-12 col-md-3'>
                                            <input type='radio' name='sort' value='phone' class='form-val'
                                            <?php if (isset($data['sort']) && $data['sort'] == 'phone') echo 'checked'?>>
                                            Số điện thoại
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class='form-group'>
                                    <label for='type-sort'>Kiểu sắp xếp :</label>
                                    <div id='type-sort' class='form-control-static'>
                                        <div class='col-xs-6 col-md-6'>
                                            <input type='radio' name='type_sort' value='asc' class='form-val'
                                            <?php if (empty($data['type']) || isset($data['type']) && $data['type'] == 'asc') echo 'checked'?>>
                                            Tăng dần
                                        </div>
                                        <div class='col-xs-6 col-md-6'>
                                            <input type='radio' name='type_sort' value='desc' class='form-val'
                                            <?php if (isset($data['type']) && $data['type'] == 'desc') echo 'checked'?>>
                                            Giảm dần
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class='modal-footer'>
                    <button type="button" id='btn-filter' class='btn btn-success'>Tìm</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
