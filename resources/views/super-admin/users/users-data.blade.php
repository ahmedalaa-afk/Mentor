<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header">
        <div class="col-lg-4 col-md-6">
            <div class="mt-3">
                <h5 class="d-inline">Users Table</h5>

            </div>
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
                        <a class="btn btn-danger" wire:click.prevent="$dispatch('deleteUser', { id: {{ $user->id }} })" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                            Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Basic Bootstrap Table -->