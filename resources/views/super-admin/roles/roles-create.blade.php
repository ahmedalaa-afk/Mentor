<x-custom-modal id="createModal" title="New Role">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent='submit'>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nameBasic" class="form-label">Name</label>
                    <input type="text" wire:model='name' id="nameBasic" class="form-control" placeholder="Enter Name" />
                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</x-custom-modal>