<div class="col-5 border py-5 rounded account-setting-sidebar">
    <div class="row d-flex flex-column gap-5">
        <div class="col">
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
