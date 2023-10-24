@extends('layout.owner')

@section('content')
    <div class="container-owner">
        <x-alert-errors />
        <div class="sidebar-owner">
            <h2>ADMIN DASHBOARD</h2>
            <div class="sidebar-owner__item">
                <a href="{{ route('admin_owner.index') }}" class="sidebar-owner__link">Quản lý tài khoản chủ khách sạn</a>
            </div>
            <div class="sidebar-owner__item">
                <a href="{{ route('admin_owner.create') }}" class="sidebar-owner__link">Thêm tài khoản chủ khách sạn</a>
            </div>
            <div class="sidebar-owner__item">
                <a href="{{ route('admin_user.index') }}" class="sidebar-owner__link">Quản lý tài khoản người dùng</a>
            </div>
            <div class="sidebar-owner__item">
                <a href="#" class="sidebar-owner__link">Chưa nghĩ ra</a>
            </div>
            <div class="owner-logout">
                <a href="#" class="sidebar-owner__link">Đăng xuất</a>
            </div>
        </div>
        <div class="table-admin">
            <h3>Chỉnh sửa thông tin khách hàng</h3>
            <form action="{{ route('admin_user.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">Firstname</label>
                    <input type="text" name="first_name" id="first_name" placeholder="Firstname" class="form-control"
                        value="{{ $user->userInfo->first_name ?? null }}" />
                </div>
                <div class="form-group">
                    <label for="last_name">Lastname</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Lastname" class="form-control"
                        value="{{ $user->userInfo->last_name ?? null }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control"
                        value="{{ $user->email ?? null }}">
                </div>
                <div class="form-group">
                    <label for="phone_number">Telephone</label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Telephone" class="form-control"
                        value="{{ $user->userInfo->phone_number ?? null }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Address" class="form-control"
                        value="{{ $user->userInfo->address ?? null }}">
                </div>
                <div class="form-group">
                    <label for="dob">Birthday</label>
                    <input type="date" name="dob" id="dob" value="{{ $user->userInfo->dob ?? null }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
        </div>
    </div>
@endsection
