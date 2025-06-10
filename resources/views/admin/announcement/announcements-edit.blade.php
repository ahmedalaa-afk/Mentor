<x-custom-modal id="editModal" title="Edit Announcement">
    <form wire:submit.prevent='submit'>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" wire:model="title" placeholder="Enter announcement title">
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" wire:model="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" wire:model="description" rows="4"
                    placeholder="Enter announcement description"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" wire:model="start_at">
                    @error('start_at') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control" wire:model="end_at">
                    @error('end_at') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" wire:model="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Importance</label>
                    <select class="form-select" wire:model="importance">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                    @error('importance') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Target Audience</label>
                    <select class="form-select" wire:model="target_audience">
                        <option value="all">All</option>
                        <option value="students">Students</option>
                        <option value="teachers">Teachers</option>
                        <option value="admins">Admins</option>
                    </select>
                    @error('target_audience') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" wire:model="image" accept="image/*">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                @if($image)
                <img src="{{ $image->temporaryUrl() }}" class="mt-2" style="max-height: 200px;">
                @elseif($old_image)
                <img src="{{ asset('storage/' . $old_image) }}" class="mt-2" style="max-height: 200px;">
                @endif
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="is_pinned" id="is_pinned">
                    <label class="form-check-label" for="is_pinned">
                        Pin this announcement
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                wire:click="$dispatch('resetForm')">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</x-custom-modal>