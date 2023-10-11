@extends('layout.app')

@section('content')
    <div class="container grid">
        @if ($country || $price || $keyword)
            <h2>Kết quả tìm kiếm cho: {{ $keyword }} {{ $country }} 
                @if (isset($price))
                {{ $priceString }}
            @endif
            </h2>
        @endif
        <div class="hotel-main-list">
            @foreach ($hotels as $hotel)
                <div class="hotel-main-item">
                    <!-- slideshow hình ảnh -->
                    <div class="hotel-slide-img">
                        <img class="hotel-main-img" src="{{ $hotel->image1 }}" idx="0" alt="">
                        <img class="hotel-main-img" src="{{ $hotel->image2 }}" idx="1" alt="">
                        <img class="hotel-main-img" src="{{ $hotel->image3 }}" idx="2" alt="">
                        <!-- mũi tên chuyển ảnh -->
                        <i class="btn-change fas fa-chevron-left prev" style="color: #050505;"></i>
                        <i class="btn-change fas fa-chevron-right next" style="color: #050505;"></i>
                        <!-- chấm vị trí ảnh -->
                        <div class="change-dot">
                            <button class="index-button active" idx="0"></button>
                            <button class="index-button" idx="1"></button>
                            <button class="index-button" idx="2"></button>
                        </div>
                    </div>
                    {{-- logo favorite hotel --}}
                    <div class="favorite-hotel">
                        <i class="far fa-heart" style="color: #fdfdfd"></i>
                    </div>
                    {{-- Thông tin khách sạn --}}
                    <div class="hotel-main-info">
                        <h4 class="hotel-main-name">{{ $hotel->name }}</h4>
                        <p class="hotel-main-add">{{ $hotel->city }}, {{ $hotel->country }}</p>
                        <p class="hotel-main-day">{{ $hotel->check_in_date }}</p>
                        <span class="hotel-main-price">${{ number_format($hotel->price, 2) }} / đêm</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
