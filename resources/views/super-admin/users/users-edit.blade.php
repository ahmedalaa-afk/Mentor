<x-custom-modal id="editModal" title="Edit User Roles">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="submit">
        <div class="modal-body">
            <!-- Current roles -->
            <div class="mb-3">
                <strong>Current Roles:</strong><br>
                @if ($user && $user->roles->isNotEmpty())
                @foreach ($user->roles as $role)
                <span class="badge bg-success me-1">{{ $role->name }}</span>
                @endforeach
                @else
                <span class="text-muted">No roles assigned</span>
                @endif
            </div>

            <!-- Replace roles switch -->
            <div class="form-check form-switch mb-3">
                <input class="form-check-input"
                    type="checkbox"
                    id="replaceRolesSwitch"
                    wire:model="replaceRoles">
                <label class="form-check-label" for="replaceRolesSwitch">
                    Replace all existing roles with selected ones
                </label>
            </div>

            <!-- Role selection checkboxes -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong>Select Roles:</strong>
                    @foreach ($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input"
                            type="checkbox"
                            id="roleCheckbox{{ $role->id }}"
                            value="{{ $role->name }}"
                            wire:model="newRoles">
                        <label class="form-check-label" for="roleCheckbox{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                    @endforeach

                    @error('selectedRoles')
                    <span class="text-danger d-block mt-2">Please select at least one role.</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-primary">
                Save changes
            </button>
        </div>
    </form>
</x-custom-modal>