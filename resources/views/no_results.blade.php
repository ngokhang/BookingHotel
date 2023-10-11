@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Không có kết quả tìm kiếm cho: {{ $keyword }} {{ $country }} @if (isset($price))
                ${{ number_format($price) }}
            @endif
        </h2>
        <img src="uploads/images/hotels/no_results.png" alt="">
        <p>Xin lỗi, không có kết quả nào phù hợp với tìm kiếm của bạn.</p>
    </div>
@endsection
