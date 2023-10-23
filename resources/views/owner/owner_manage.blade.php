@extends('layout.owner')

@section('content')
    <div class="container-owner">
        <div class="sidebar-owner">
            <h2>HOTEL DASHBOARD</h2>
            <div class="sidebar-owner__item">
                <a href="{{ route('owner_manage.index') }}" class="sidebar-owner__link">Quản lý khách sạn</a>
            </div>
            <div class="sidebar-owner__item">
                <a href="{{ route('add-hotel') }}" class="sidebar-owner__link">Thêm khách sạn</a>
            </div>
            <div class="sidebar-owner__item">
                <a href="{{ route('booking-list.index') }}" class="sidebar-owner__link">Quản lý đơn đặt phòng</a>
            </div>
            <div class="sidebar-owner__item">
                <a href="#" class="sidebar-owner__link">Thay đổi mật khẩu</a>
            </div>
            <div class="owner-logout">
                <a href="#" class="sidebar-owner__link">Đăng xuất</a>
            </div>
        </div>
        <div class="table-owner">
            <h3>Danh sách khách sạn</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách sạn</th>
                        <th>Địa chỉ</th>
                        <th>Giá tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->hotels as $hotel)
                        <tr>
                            <td>{{ $hotel->id }}</td>
                            <td>{{ $hotel->name }}</td>
                            <td>{{ $hotel->city }}, {{ $hotel->country }}</td>
                            <td>${{ $hotel->price }}</td>
                            <td>
                                <a href="{{ route('hotel.edit', ['hotel' => $hotel->id]) }}" class="btn btn-edit">Sửa</a>
                                <form action="{{ route('hotel.destroy', ['hotel' => $hotel->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
