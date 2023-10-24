@extends('layout.app')

@section('title', 'Personal info')

@section('content')
    <div class="wrapper container">
        <section id="form-update">
            <x-alert-errors />
            <form action="{{ route('profile.update', ['id' => $dataUser->id]) }}" method="POST" id="form"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{ $dataUser->id }}">
                <div class="form-title">
                    <h4>Personal information</h4>
                </div>
                <div class="form-input">
                    <label for="first_name">Firstname</label>
                    <input type="text" name="first_name" id="first_name" placeholder="Firstname"
                        value="{{ $dataUser->userInfo->first_name }}" />
                </div>
                <div class="form-input">
                    <label for="last_name">Lastname</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Lastname"
                        value="{{ $dataUser->userInfo->last_name }}">
                </div>
                <div class="form-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ $dataUser->email }}">
                </div>
                <div class="form-input">
                    <label for="phone_number">Telephone</label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Telephone"
                        value="{{ $dataUser->userInfo->phone_number }}">
                </div>
                <div class="form-input">
                    <label for="dob">Birthday</label>
                    <input type="date" name="dob" id="dob" value="{{ $dataUser->userInfo->dob }}">
                </div>
                <div class="form-input input-file">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <div class="preview-img">
                    <img src="{{ asset('uploads/avatar/' . $avatar) }}" alt="user_avatar">
                </div>
                <div class="form-btn">
                    <button class="button-submit">Update</button>
                </div>
            </form>
        </section>
    </div>
@endsection
