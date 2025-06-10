<div class="container" data-aos="fade-up" data-aos-delay="100" wire:ignore.self>
    <div class="row">
        <div class="col-lg-12">
            <div class="announcement-filters mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" wire:model.live="selectedCategory">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" wire:model.live="selectedImportance">
                            <option value="">All Importance Levels</option>
                            @foreach ($importances as $level)
                            <option value="{{$level}}">{{ucfirst($level)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gy-4">
        @forelse ($announcements as $announcement)
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200" wire:ignore.self>
            <div class="announcement-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title">{{$announcement->title}}</h3>
                            <span
                                class="badge bg-{{ $announcement->importance === 'high' ? 'danger' : ($announcement->importance === 'medium' ? 'warning' : 'info') }}">
                                {{ucfirst($announcement->importance)}}
                            </span>
                        </div>
                        <p class="card-text">{{$announcement->description}}</p>
                        <div class="announcement-details">
                            <p><strong>Category:</strong> {{ optional($announcement->category)->name ??
                                'N/A' }}</p>
                            <p><strong>Date:</strong> {{$announcement->start_at}} -
                                {{$announcement->end_at}}</p>
                            <p><strong>Status:</strong> {{ucfirst($announcement->status)}}</p>
                        </div>
                        <div class="mt-3">
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">
                No announcements found.
            </div>
        </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $announcements->links() }}
    </div>
</div>