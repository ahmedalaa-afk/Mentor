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
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pinned</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Target Audience</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Importance</th>
                        <th>Views</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($announcements as $announcement)
                    <tr>
                        <td>
                            @if($announcement->is_pinned)
                            <i class="bx bx-pin text-primary"></i>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($announcement->image)
                                <img src="{{ asset('storage/' . $announcement->image) }}"
                                    alt="{{ $announcement->title }}" class="rounded-circle me-2" width="32" height="32">
                                @endif
                                <strong>{{ $announcement->title }}</strong>
                            </div>
                        </td>
                        <td>{{ $announcement->category->name }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ ucfirst($announcement->target_audience) }}
                            </span>
                        </td>
                        <td>{{ $announcement->start_at }}</td>
                        <td>{{ $announcement->end_at }}</td>
                        <td>
                            <span class="badge bg-{{ $announcement->status === 'active' ? 'success' : 'danger' }}">
                                {{ ucfirst($announcement->status) }}
                            </span>
                        </td>
                        <td>
                            <span
                                class="badge bg-{{ $announcement->importance === 'high' ? 'danger' : ($announcement->importance === 'medium' ? 'warning' : 'info') }}">
                                {{ ucfirst($announcement->importance) }}
                            </span>
                        </td>
                        <td>{{ $announcement->views_count }}</td>
                        <td>{{ $announcement->admin->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('editAnnouncement', { id: {{ $announcement->id }} })">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="$dispatch('deleteAnnouncement', { id: {{ $announcement->id }} })">
                                        <i class="bx bx-trash me-1"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $announcements->links() }}
        </div>
    </div>