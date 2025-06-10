<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body p-4">
                    <h2 class="h4 text-dark font-weight-bold">Update Password</h2>
                    <p class="text-muted">Ensure your account is using a strong password.</p>

                    @if ($message)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="submit" class="mt-3">
                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label text-dark">Current Password</label>
                            <input type="password" id="current_password" wire:model="current_password" 
                                class="form-control" placeholder="Enter current password">
                            @error('current_password') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="new_password" class="form-label text-dark">New Password</label>
                            <input type="password" id="new_password" wire:model="new_password" 
                                class="form-control" placeholder="Enter new password">
                            @error('new_password') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label text-dark">Confirm New Password</label>
                            <input type="password" id="new_password_confirmation" 
                                wire:model="new_password_confirmation" class="form-control" 
                                placeholder="Confirm new password">
                        </div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-danger px-4 py-2">
                                <i class="bi bi-lock"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
