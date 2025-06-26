<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-person-workspace text-primary me-2" style="font-size: 1.5rem;"></i>
                        <h2 class="h4 text-dark font-weight-bold mb-0">Upgrade to Teacher</h2>
                    </div>
                    <p class="text-muted">Apply to become a teacher and start sharing your knowledge with students.</p>

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if($hasExistingApplication)
                    <div class="alert alert-info">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-info-circle me-2"></i>
                            <div>
                                <strong>Application Status:</strong>
                                <span
                                    class="badge bg-{{ $applicationStatus === 'approved' ? 'success' : ($applicationStatus === 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($applicationStatus) }}
                                </span>
                            </div>
                        </div>
                        @if($applicationStatus === 'pending')
                        <p class="mb-0 mt-2">Your application is under review. We will notify you once a decision is
                            made.</p>
                        @elseif($applicationStatus === 'approved')
                        <p class="mb-0 mt-2">Congratulations! Your application has been approved. You can now access
                            teacher features.</p>
                        @elseif($applicationStatus === 'rejected')
                        <p class="mb-0 mt-2">Your application was not approved at this time. You may reapply in the
                            future.</p>
                        @endif
                    </div>
                    @else
                    @if(!$showForm)
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="bi bi-mortarboard text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5>Ready to Teach?</h5>
                        <p class="text-muted">Share your expertise and help students learn. Apply now to become a
                            teacher!</p>
                        <button wire:click="showApplicationForm" class="btn btn-primary btn-lg">
                            <i class="bi bi-arrow-up-circle me-2"></i>
                            Apply Now
                        </button>
                    </div>
                    @else
                    <form wire:submit.prevent="submitApplication" class="mt-3">


                        <!-- CV Upload -->
                        <div class="mb-3">
                            <label for="cv" class="form-label text-dark">CV/Resume</label>
                            <input type="file" id="cv" wire:model="cv" class="form-control" accept=".pdf,.doc,.docx">
                            <small class="text-muted">Upload your CV in PDF, DOC, or DOCX format (max 2MB)</small>
                            @error('cv') <span class="text-danger small d-block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between">
                            <button type="button" wire:click="$set('showForm', false)"
                                class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-1"></i> Submit Application
                            </button>
                        </div>
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>