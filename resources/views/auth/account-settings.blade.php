@extends('layout.app')

@section('title', 'Account settings')

@section('content')
    <section class="container profile-content my-5">
        <div class="title col-12 title mb-3 border-bottom pt-2 pb-4">
            <h1 class="fs-3">Manage account</h1>
        </div>
        <div class="wrapper row mt-5">
            <div class="col-5 border rounded account-setting-sidebar">
                <div class="d-flex flex-column gap-5 pt-3">
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
                <form action="{{ route('profile.update', ['id' => 1]) }}" class="row" id="form-update-profile"
                    method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <x-alert-errors />
                    <input type="hidden" value="{{ $dataUser->id }}" name="user_id">
                    <div class="input-group d-flex flex-column mb-3 col-12 gap-3 ps-5">
                        <label for="profile-firstname" class="d-block">First name</label>
                        <input type="text" class="d-block w-100 form-control input-form" name="first_name"
                            id="profile-firstname" placeholder="First name" value="{{ $dataUser->userInfo->first_name }}">
                    </div>
                    <div class="input-group d-flex flex-column mb-3 col-12 gap-3 ps-5">
                        <label for="profile-lastname" class="d-block">Last name</label>
                        <input type="text" class="d-block w-100 form-control input-form" name="last_name"
                            id="profile-lastname" placeholder="Last name" value="{{ $dataUser->userInfo->last_name }}">
                    </div>
                    <div class="input-group d-flex flex-column mb-3 col-12 gap-3 ps-5">
                        <label for="profile-email" class="d-block">Email</label>
                        <input type="email" class="d-block w-100 form-control input-form" name="email"
                            id="profile-email" placeholder="Email" value="{{ $dataUser->email }}">
                    </div>
                    <div class="input-group d-flex flex-column mb-3 col-12 gap-3 ps-5">
                        <label for="profile-birthday" class="d-block">Birthday</label>
                        <input type="date" class="d-block w-100 form-control input-form" name="dob"
                            id="profile-birthday" placeholder="Email" value="{{ $dataUser->userInfo->dob }}">
                    </div>
                    <div class="input-group d-flex flex-column mb-3 col-12 gap-3 ps-5">
                        <label for="profile-address" class="d-block">Address</label>
                        <input type="text" class="d-block w-100 form-control input-form" name="address"
                            id="profile-address" placeholder="Address" value="{{ $dataUser->userInfo->address }}">
                    </div>
                    <div class="input-group d-flex flex-column mb-3 col-12 gap-3 ps-5">
                        <label for="profile-phonenumber" class="d-block">Phonenumber</label>
                        <input type="text" class="d-block w-100 form-control input-form" name="phone_number"
                            id="profile-phonenumber" placeholder="Address" value="{{ $dataUser->userInfo->phone_number }}">
                    </div>
                    <div class="input-group d-flex flex-column mb-3 col-12 gap-3 ps-5">
                        <label for="profile-avatar" class="d-block">Avatar</label>
                        <input type="file" class="form-control w-100" id="profile-avatar" name="avatar" />
                    </div>
                    <div class="form-btn-submit ps-5">
                        <button class="btn btn-primary btn-update-profile">Update</button>
                    </div>
                </form>
            </div>

        </div>

    </section>
@endsection
