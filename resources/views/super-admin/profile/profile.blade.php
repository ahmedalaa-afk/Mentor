<div class="d-flex flex-column align-items-center">
    <form action="{{ route('user.profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="text-center">
        @csrf
        <div class="mb-3">
            @if (Auth::user()->image)
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Photo"
                class="rounded-circle border shadow-lg" width="150" height="150">
            @else
            <img src="{{ asset('default-profile.png') }}" alt="Default Profile" class="rounded-circle border shadow-lg"
                width="150" height="150">
            @endif
        </div>

        <label class="btn btn-outline-primary">
            Choose Photo <input type="file" name="image" class="d-none">
        </label>

        @error('image')
        <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn btn-primary">Update Photo</button>

        @if (session()->has('message'))
        <div class="alert alert-success mt-2">{{ session('message') }}</div>
        @endif
    </form>
</div>