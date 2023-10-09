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
            <input type="password" class="form-control w-75" name="current_password" id="profile-currentPassowrd"
                placeholder="Current password">
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
