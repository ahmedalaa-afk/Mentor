<x-custom-modal id="createModal" title="New Teacher">
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
                    <label for="emailBasic" class="form-label">Email</label>
                    <input type="email" wire:model='email' id="emailBasic" class="form-control"
                        placeholder="example@gmail.com" />
                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="passwordBasic" class="form-label">Password</label>
                    <input type="password" wire:model='password' id="passwordBasic" class="form-control"
                        placeholder="Enter password" />
                    @error('password') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirmBasic" class="form-label">Confirm Password</label>
                    <input type="password" wire:model='password_confirmation' id="confirmBasic"
                        class="form-control" />
                    @error('password_confirmation') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" wire:model='phone' id="phone" class="form-control" placeholder="Enter Phone" />
                    @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select wire:model='gender' id="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="birthdate" class="form-label">Birthdate</label>
                    <input type="date" wire:model='birthdate' id="birthdate" class="form-control" />
                    @error('birthdate') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" wire:model='address' id="address" class="form-control"
                        placeholder="Enter Address" />
                    @error('address') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" wire:model='city' id="city" class="form-control" placeholder="Enter City" />
                    @error('city') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" wire:model='country' id="country" class="form-control"
                        placeholder="Enter Country" />
                    @error('country') <span class="text-danger">{{$message}}</span> @enderror
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
