<div class="history-booking-table">
    <div class="title">
        <h3 class="title">Bạn đã từng ở những địa điểm</h3>
    </div>
    <table class="booking-list">
        <thead>
            <tr>
                <th>Khách sạn</th>
                <th>Thành phố</th>
                <th>Quốc gia</th>
                <th>Trạng thái</th>
                <th>Tuỳ chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historyBookingData as $data)
                @include('user.detail-booking', ['data' => $data])
                <tr class="hotel">
                    <td><a href="#">{{ $data->name }}</a></td>
                    <td><a href="#">{{ $data->city }}</a></td>
                    <td><a href="#">{{ $data->country }}</a></td>
                    @if ($data->pivot->checked_out == 1)
                        <td>Đã trả phòng</td>
                    @endif
                    <td>
                        <div class="list-btn">
                            <x-evalution-form :data="$data" />
                            <button class="detail-btn" data-target="infor-{{ $data->id }}">Xem thông tin chi
                                tiết</button>
                            <button class='evaluation-btn' data-target="evaluation-form-{{ $data->id }}">Đánh giá
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
