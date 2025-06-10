<x-custom-modal id="editModal" title="Edit Category">
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
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlSelect1" class="form-label">Select Parent</label>
                    <select wire:model="parent" class="form-select">
                        <option value="">Select Parent</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($selectedCategory && $selectedCategory->parent &&
                            $selectedCategory->parent->name == $category->name)
                            selected
                            @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('parent') <span class="text-danger">{{ $message }}</span> @enderror

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