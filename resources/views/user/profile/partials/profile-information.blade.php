<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body p-4">
                    <h2 class="h4 text-dark font-weight-bold">Profile Information</h2>
                    <p class="text-muted">Update your account's profile information and email address.</p>

                    @if ($message)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form wire:submit.prevent="submit" class="mt-3">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label text-dark">Name</label>
                            <input type="text" id="name" wire:model="name" class="form-control"
                                placeholder="Enter your name">
                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input type="email" id="email" wire:model="email" class="form-control"
                                placeholder="Enter your email">
                            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label text-dark">Phone</label>
                            <input type="text" id="phone" wire:model="phone" class="form-control"
                                placeholder="Enter your phone number">
                            @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label text-dark">Address</label>
                            <input type="text" id="address" wire:model="address" class="form-control"
                                placeholder="Enter your address">
                            @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Country -->
                        <div class="mb-3">
                            <label for="country" class="form-label text-dark">Country</label>
                            <input type="text" id="country" wire:model="country" class="form-control"
                                placeholder="Enter your country">
                            @error('country') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- City -->
                        <div class="mb-3">
                            <label for="city" class="form-label text-dark">City</label>
                            <input type="text" id="city" wire:model="city" class="form-control"
                                placeholder="Enter your city">
                            @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label text-dark">Gender</label>
                            <select id="gender" wire:model="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Birthdate -->
                        <div class="mb-3">
                            <label for="birthdate" class="form-label text-dark">Birthdate</label>
                            <input type="date" id="birthdate" wire:model="birthdate" class="form-control">
                            @error('birthdate') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="bi bi-save"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>