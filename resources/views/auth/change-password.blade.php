@extends('layout.app')

@section('content')
    <section class="container profile-content my-5">
        <div class="col-12 title mb-3 border-bottom pt-2 pb-4">
            <h1 href="#" class="fs-3">Manage account</h1>
        </div>
        <div class="wrapper row mt-5">
            <div class="col-5 border rounded account-setting-sidebar">
                <div class="row d-flex flex-column gap-5 pt-3">
                    <div class="show-info">
                        <div class="user-avatar">
                            <label class="avatar-mask">
                                <img src='{{ asset('uploads/avatar/' . "$avatar") }}' test="{{ $avatar }}"
                                    onerror="this.style.display='none'">
                            </label>
                        </div>
                        <div class="text">
                            <h3 class="username">{{ $fullname }}</h3>
                        </div>
                    </div>
                    <ul class="col list-group menu-update">
                        <li class="list-group-item menu-update-item">
                            <a href="{{ route('profile.edit') }}"
                                class="text-decoration-none fs-5 link {{ Request::path() == 'account' ? 'active' : '' }}">
                                Your profile
                            </a>
                        </li>
                        <li class="list-group-item menu-update-item">
                            <a href="{{ route('password.edit') }}"
                                class="text-decoration-none fs-5 link {{ Request::path() == 'account/password' ? 'active' : '' }}">
                                Change password
                            </a>
                        </li>
                        <li class="list-group-item menu-update-item">
                            <a href="#" class="text-decoration-none fs-5 link">
                                Booking list
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-7">
                {{-- <x-alert-errors /> --}}
                <form action="{{ route('password.update') }}" class="row" id="form-change-password" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <x-alert-errors />
                    <input type="hidden" value="{{ $dataUser->id }}" name="user_id">
                    <div class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2">
                        <label for="profile-currentPassowrd" class="d-block">Current password</label>
                        <input type="password" class="form-control w-75" name="current_password"
                            id="profile-currentPassowrd" placeholder="Current password">
                        {{-- @if ($errors->has('current_password'))
                            @php
                                Alert::error('error', $errors->first('current_password'));
                            @endphp
                        @endif --}}
                    </div>
                    <div class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2">
                        <label for="profile-currenPassowrd" class="d-block">New password</label>
                        <input type="password" class="form-control w-75" name="new_password" id="profile-currentPassowrd"
                            placeholder="New password">
                        {{-- @if ($errors->has('new_password'))
                            @php
                                Alert::error('error', $errors->first('new_password'));
                            @endphp
                        @endif --}}
                    </div>
                    <div class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2">
                        <label for="profile-currenPassowrd" class="d-block">Confirm new password</label>
                        <input type="password" class="form-control w-75" name="new_password_confirmation"
                            id="profile-confirmNewPassword" placeholder="Confirm new password">
                    </div>
                    <div class="form-btn-submit ps-5">
                        <button class="btn btn-primary btn-update-profile">Change password</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
