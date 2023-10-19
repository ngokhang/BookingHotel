<div class="booking-table active">
    <div class="title">
        <h3 class="title">Bạn đã đặt những phòng sau</h3>
    </div>
    <table class="booking-list">
        <thead>
            <tr>
                <th>Khách sạn</th>
                <th>Địa điểm</th>
                <th>Trạng thái</th>
                <th>Tuỳ chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userBookingData as $data)
                @include('user.detail-booking', ['data' => $data])
                <tr class="hotel">
                    <td><a href="#">{{ $data->name }}</a></td>
                    <td><a href="#">{{ $data->city }} , {{ $data->country }}</a></td>
                    @if ($data->pivot->accepted == 1)
                        <td>Thành công</td>
                    @else
                        <td>Đang chờ</td>
                    @endif
                    <td>
                        <div class="list-btn">
                            <button class="detail-btn" data-target="infor-{{ $data->id }}">Xem thông tin chi
                                tiết</button>
                            <form action="{{ route('booking.destroy', ['booking_id' => $data->pivot->id]) }}"
                                method="post">
                                @method('delete')
                                @csrf
                                <button {{ $data->pivot->accepted == 0 ? '' : 'disabled' }}
                                    class='cancel-booking-btn'>Huỷ
                                    đặt phòng</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
