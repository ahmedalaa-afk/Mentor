<!-- Teacher Applications Table -->
<div class="card">
    <div class="card-header">
        <div class="col-lg-4 col-md-6">
            <div class="mt-3">
                <h5 class="d-inline">Teacher Applications</h5>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Applied At</th>
                    <th>CV</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->user->name ?? 'N/A' }}</td>
                    <td>{{ $application->user->email ?? 'N/A' }}</td>
                    <td>{{ $application->apply_at }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $application->cv) }}" target="_blank">View CV</a>
                    </td>
                    <td>{{ ucfirst($application->status) }}</td>
                    <td>
                        @if($application->status === 'pending')
                        <button class="btn btn-success btn-sm"
                            wire:click="accept({{ $application->id }})">Accept</button>
                        <button class="btn btn-danger btn-sm"
                            wire:click="reject({{ $application->id }})">Reject</button>
                        @else
                        <span class="text-muted">No action</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No applications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $applications->links() }}
        </div>
    </div>
</div>
<!--/ Teacher Applications Table -->