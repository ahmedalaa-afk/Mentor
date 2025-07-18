<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header d-flex justify-content-left align-items-center flex-wrap gap-3">
        <h5 class="mb-0">Users Table</h5>
        <div style="min-width: 250px;">
            <input
                type="search"
                class="form-control"
                placeholder="Search..."
                id="html5-search-input"
                wire:model.debounce.500ms="search" />
        </div>
    </div>



    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $user)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$user->name}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$user->email}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{ $user->roles->pluck('name')->join(', ') }}</strong></td>
                    <td>
                        <a class="btn btn-info" wire:click.prevent="$dispatch('editUser', { id: {{ $user->id }} })" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            User Role </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Basic Bootstrap Table -->