<!-- Basic Bootstrap Table -->
<div class="card">
    <div class="card-header">
        <div class="col-lg-4 col-md-6">
            <div class="mt-3">
                <h5 class="d-inline">Teachers Table</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary mb-2 mx-2" data-bs-toggle="modal"
                    data-bs-target="#createModal">
                    Add New
                </button>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($teachers as $teacher)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{$teacher->name}}</strong></td>
                    <td>{{$teacher->email}}</td>
                    <td>
                        <a class="btn btn-info" wire:click.prevent="$dispatch('editTeacher', { id: {{ $teacher->id }} })"  href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                            Edit</a>
                        <a class="btn btn-primary" wire:click.prevent="$dispatch('teacherDetails', { id: {{ $teacher->id }} })" href="javascript:void(0);"><i class="bx bx-show me-1"></i>
                            Show</a>
                        <a class="btn btn-danger" wire:click.prevent="$dispatch('deleteTeacher', { id: {{ $teacher->id }} })" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                            Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--/ Basic Bootstrap Table -->