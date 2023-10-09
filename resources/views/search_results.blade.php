@extends('home')

@section('content')
    <div class="container">
        <h1>Kết quả tìm kiếm cho: {{ $country }}</h1>
        <ul>
            @foreach ($hotels as $hotel)
                <a href="#" class="hotel-main-item">
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
                        <h4 class="hotel-main-add">{{ $hotel->city }}, {{ $hotel->country }}</h4>
                        <p class="distance">Cách {{ $hotel->distance }}km</p>
                        <p class="hotel-main-day">{{ $hotel->check_in_date }}</p>
                        <span class="hotel-main-price">${{ $hotel->price }} / đêm</span>
                    </div>
                </a>
            @endforeach
        </ul>
    </div>
@endsection
