<form action="{{ route('hotel.update', ['hotel' => $hotelInfo->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div><input type="text" name="name" value="{{ $hotelInfo->name }}"></div>
    <div><input type="text" name="city" value="{{ $hotelInfo->city }}"></div>
    <div><input type="text" name="country" value="{{ $hotelInfo->country }}"></div>
    <div><input type="text" name="description" value="{{ $hotelInfo->description }}"></div>
    <div><input type="date" name="check_in_date" value="{{ $hotelInfo->check_in_date }}"></div>
    <div><input type="text" name="price" value="{{ $hotelInfo->price }}"></div>
    <div><input type="text" name="num_guest" value="{{ $hotelInfo->num_guest }}"></div>
    <input type="file" name="image[]" value="{{ $hotelInfo->image1 }}" multiple>
    <div><button>Submit</button></div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
