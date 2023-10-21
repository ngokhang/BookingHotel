<div class="booking-table active">
    <div class="title">
        <h3 class="title">Bạn đã đặt những phòng sau</h3>
    </div>
    <table class="booking-list">
        <thead>
            <tr>
                <th>Khách sạn</th>
                <th>Địa điểm</th>
                <th>Số tiền phải trả</th>
                <th>Trạng thái</th>
                <th>Tuỳ chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userBookingData as $data)
                @include('user.detail-booking', ['data' => $data])
                <tr class="hotel current-booking" data-target="infor-{{ $data->id }}">
                    <td><a href="#">{{ $data->hotel->name }}</a></td>
                    <td><a href="#">{{ $data->hotel->city }} , {{ $data->hotel->country }}</a></td>
                    <td>
                        <p>{{ $data->total_cost }}</p>
                    </td>
                    @if ($data->accepted == 1)
                        <td>Thành công</td>
                    @else
                        <td>Đang chờ</td>
                    @endif
                    <td>
                        <div class="list-btn">
                            <button class="detail-btn" data-target="infor-{{ $data->id }}">Xem thông tin chi
                                tiết</button>
                            <form action="{{ route('booking.destroy', ['booking_id' => $data->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button {{ $data->accepted == 0 ? '' : 'disabled' }} class='cancel-booking-btn'>Huỷ
                                    đặt phòng</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            @foreach ($history as $data)
                @include('user.detail-booking', ['data' => $data])
                <tr class="hotel history-booking" data-target="infor-{{ $data->id }}">
                    <td>
                        <p>{{ $data->hotel->name }}</p>
                    </td>
                    <td>
                        <p>{{ $data->hotel->city }} - {{ $data->hotel->country }}</p>
                    </td>
                    <td>
                        <p>{{ $data->total_cost }}</p>
                    </td>
                    @if ($data->deleted_at != null)
                        <td>Đã trả phòng</td>
                    @else
                        <td>Chưa trả phòng</td>
                    @endif
                    <td>
                        <div class="list-btn">
                            <x-evalution-form :data="$data" />
                            <button class="detail-btn" data-target="infor-{{ $data->id }}">Xem thông tin chi
                                tiết</button>
                            @if ($data->deleted_at)
                                <button class='evaluation-btn' data-target="evaluation-form-{{ $data->id }}">Đánh
                                    giá
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
