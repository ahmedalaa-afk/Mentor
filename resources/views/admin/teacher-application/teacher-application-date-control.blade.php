<div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            Teacher Application Date Control
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label for="start_at" class="form-label">Start Date & Time</label>
                    <input type="datetime-local" id="start_at" wire:model.defer="start_at" class="form-control">
                    @error('start_at') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="end_at" class="form-label">End Date & Time</label>
                    <input type="datetime-local" id="end_at" wire:model.defer="end_at" class="form-control">
                    @error('end_at') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>