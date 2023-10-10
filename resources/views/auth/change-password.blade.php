@extends('layout.app')

@section('content')
    <div class="wrapper container">
        <section id="form-update">
            <x-alert-errors/>
            <form action="{{ route('password.update') }}" method="POST" id="form">
                @method('PUT')
                @csrf
                <div class="form-title">
                    <h4>Change password</h4>
                </div>
                <div class="form-input">
                    <label for="current_password">Current password</label>
                    <input type="password" name="current_password" id="current_password" placeholder="Current password"/>
                </div>
                <div class="form-input">
                    <label for="new_password">New password</label>
                    <input type="password" name="new_password" id="new_password" placeholder="New password">
                </div>
                <div class="form-input">
                    <label for="new_password_">Confirm new password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirm"
                           placeholder="Confirm new password">
                </div>
                <div class="form-btn">
                    <button class="button-submit">Change</button>
                </div>
            </form>
        </section>
    </div>
@endsection
