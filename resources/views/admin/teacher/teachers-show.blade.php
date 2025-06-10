<x-custom-modal id="showModal" title="Teacher Details">
    @if (is_array($teacher) || is_object($teacher))
    <div class="mb-3 mt-3">
        <strong>Name:</strong> <span>{{ $teacher->name }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Email:</strong> <span>{{ $teacher->email }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Phone:</strong> <span>{{ $teacher->phone ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Gender:</strong> <span>{{ ucfirst($teacher->gender) ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Birthdate:</strong> <span>{{ $teacher->birthdate ? \Carbon\Carbon::parse($teacher->birthdate)->format('d
            M Y') : 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Address:</strong> <span>{{ $teacher->address ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>City:</strong> <span>{{ $teacher->city ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Country:</strong> <span>{{ $teacher->country ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Bio:</strong> <span>{{ $teacher->bio ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Image:</strong>
        @if ($teacher->image)
        <img src="{{ asset('storage/' . $teacher->image) }}" alt="Profile Photo" class="rounded-circle border shadow-lg"
            width="150" height="150">
        @else
        <img src="{{ asset('default-profile.png') }}" alt="Default Profile" class="rounded-circle border shadow-lg"
            width="150" height="150">
        @endif
    </div>
    <div class="mb-3 mt-3">
        <strong>Social Profiles:</strong> <br>
        @if ($teacher->facebook)
        <a href="{{ $teacher->facebook }}" target="_blank">Facebook</a> |
        @endif
        @if ($teacher->twitter)
        <a href="{{ $teacher->twitter }}" target="_blank">Twitter</a> |
        @endif
        @if ($teacher->linkedin)
        <a href="{{ $teacher->linkedin }}" target="_blank">LinkedIn</a> |
        @endif
        @if ($teacher->github)
        <a href="{{ $teacher->github }}" target="_blank">GitHub</a>
        @endif
    </div>
    <div class="mb-3 mt-3">
        <strong>Language:</strong> <span>{{ $teacher->language ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Timezone:</strong> <span>{{ $teacher->timezone ?? 'N/A' }}</span>
    </div>
    <div class="mb-3 mt-3">
        <strong>Currency:</strong> <span>{{ $teacher->currency ?? 'N/A' }}</span>
    </div>
    @endif
</x-custom-modal>