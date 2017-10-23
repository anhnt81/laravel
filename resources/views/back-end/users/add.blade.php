@extends('back-end.layouts.master')

@section('title')
    Quản lý người dùng
@endsection

@section('breadcrumb')
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Người dùng</a></li>
    <li>Thêm mới</li>
@endsection

@section('content')
    <!-- main content -->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Thêm người dùng</h3>
        </div>
        <div class="panel-body">
            <form method="post" role="form" id='addUserFrm' action="{{ route('getaddUsers') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    @if($errors->has('username'))
                        <div class='alert alert-danger'>{{ $errors->first('username') }}</div>
                    @endif
                    <label for="username">Username (<span class='required'>*</span>) </label>
                    <input id="username" name="username" class="form-control" type="text"
                           value="">
                </div>

                <div class="form-group">
                    @if($errors->has('email'))
                        <div class='alert alert-danger'>{{ $errors->first('email') }}</div>
                    @endif
                    <label for="email">Email (<span class='required'>*</span>) </label>
                    <input id="email" name="email" class="form-control" type="email"
                           value="">
                </div>

                <div class="form-group">
                    @if($errors->has('phone'))
                        <div class='alert alert-danger'>{{ $errors->first('phone') }}</div>
                    @endif
                    <label for="phone">Phone (<span class='required'>*</span>) </label>
                    <input id="phone" name="phone" class="form-control" type="number"
                           value="">
                </div>

                <div class="form-group">
                    @if($errors->has('pass'))
                        <div class='alert alert-danger'>{{ $errors->first('pass') }}</div>
                    @endif
                    <label for="pass">Mật khẩu (<span class='required'>*</span>) </label>
                    <input id="pass" name="pass" class="form-control" type="password"
                           value="">
                </div>

                <div class="form-group">
                    @if($errors->has('repass'))
                        <div class='alert alert-danger'>{{ $errors->first('repass') }}</div>
                    @endif
                    <label for="repass">Nhập lại Mật khẩu (<span class='required'>*</span>) </label>
                    <input id="repass" name="repass" class="form-control" type="password"
                           value="">
                </div>
                <div class="form-group">
                    <button type='submit' class="btn btn-primary">Tạo mới</button>
                    <a href="#" class="btn btn-default">Quay Lại</a>
                </div>
            </form>
        </div>
    </div>
@endsection
