<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body p-4">
                    <h2 class="h4 text-danger font-weight-bold">Delete Account</h2>
                    <p class="text-muted">
                        Once your account is deleted, all of its data will be permanently removed. 
                        This action cannot be undone.
                    </p>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (!$confirmingDeletion)
                        <button wire:click="confirmDeletion" class="btn btn-danger px-4 py-2">
                            <i class="bi bi-trash"></i> Delete Account
                        </button>
                    @else
                        <form wire:submit.prevent="deleteAccount" class="mt-3">
                            <div class="mb-3">
                                <label for="password" class="form-label text-dark">Confirm Password</label>
                                <input type="password" id="password" wire:model="password" 
                                    class="form-control" placeholder="Enter your password">
                                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" wire:click="cancelDeletion" class="btn btn-secondary">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-exclamation-triangle"></i> Confirm Delete
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
