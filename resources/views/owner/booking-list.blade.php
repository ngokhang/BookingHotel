@extends('layout.owner')

@section('content')
    <div class="container-owner">
        <div class="sidebar-owner">
            <h2>HOTEL DASHBOARD</h2>
            <div class="sidebar-owner__item">
                <a href="{{ route('owner_manage.index') }}" class="sidebar-owner__link">Quản lý khách sạn</a>
            </div>
            <div class="sidebar-owner__item">
                <a href="#" class="sidebar-owner__link">Thêm khách sạn</a>
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
            <h3>Danh sách đơn đặt phòng</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách sạn</th>
                        <th>Người đặt</th>
                        <th>Ngày nhận phòng</th>
                        <th>Ngày trả phòng</th>
                        <th>Thành tiền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookingPendingList as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->hotel->name }}</td>
                            <td>{{ $booking->customer->name }}</td>
                            <td>{{ $booking->check_in }}</td>
                            <td>{{ $booking->check_out }}</td>
                            <td>${{ $booking->total_cost }}</td>
                            <td>
                                @if (!$booking->accepted)
                                    <form action="{{ route('owner_manage.update', ['hotel_id' => $booking->hotel->id, 'booking_id' => $booking->id]) }}"
                                        method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-accept">Đồng ý</button>
                                    </form>
                                @endif
                                @if ($booking->accepted)
                                    <form action="{{ route('owner_manage.destroy', ['hotel_id' => $booking->hotel->id, 'booking_id' => $booking->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-checkout">Trả phòng</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection