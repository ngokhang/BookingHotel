<div class="col-9">
  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
  <form action="{{route('profile.update', ['id' => 1])}}" class="row" id="form-update-profile" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <input type="hidden" value="{{$dataUser->id}}" name="user_id">
      <x-input-form type="text" class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2" name="first_name" id="profile-firstname" title="First name" value="{{ $dataUser->userInfo->first_name }}"/>
      <x-input-form type="text" class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2" name="last_name" id="profile-lastname" title="Last name" value="{{ $dataUser->userInfo->last_name }}"/>
      <x-input-form type="email" class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2" name="email" id="profile-email" title="Email" value="{{ $dataUser->email }}"/>
      <x-input-form type="date" class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2" name="dob" id="profile-birthday" title="Birthday" value="{{ $dataUser->userInfo->dob}}"/>
      <x-input-form type="text" class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2" name="address" id="profile-address" title="Address" value="{{ $dataUser->userInfo->address }}"/>
      <div class="input-group d-flex flex-column mb-3 ps-5 col-12 gap-2">
        <label for="profile-avatar" class="d-block">Avatar</label>
        <input type="file" class="form-control w-75" id="profile-avatar" name="avatar"/>
      </div>
      <div class="form-btn-submit ps-5">
        <button class="btn btn-primary btn-update-profile">Update</button>
      </div>
  </form>
</div>