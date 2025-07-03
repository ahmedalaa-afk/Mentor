<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('super-admin-assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('super-admin-assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('super-admin-assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('super-admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('super-admin-assets') }}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('super-admin-assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('super-admin-assets') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('super-admin-assets') }}/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    // super-admin => Teacher Sectino
    document.addEventListener('livewire:init', () => {
        Livewire.on('createTeacherModal', (event) => {
            $('#createModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('showTeacherModal', (event) => {
            $('#showModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteTeacherModal', (event) => {
            $('#deleteModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('editTeacherModal', (event) => {
            $('#editModal').modal('toggle');
        });
    });

    // super-admin => Category Section
    document.addEventListener('livewire:init', () => {
        Livewire.on('createCategoryModal', (event) => {
            $('#createModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteCategoryModal', (event) => {
            $('#deleteModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('editCategoryModal', (event) => {
            $('#editModal').modal('toggle');
        });
    });

    // super-admin => Announcement Section
    document.addEventListener('livewire:init', () => {
        Livewire.on('createAnnouncementModal', (event) => {
            $('#createModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('editAnnouncementModal', (event) => {
            $('#editModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteAnnouncementModal', (event) => {
            $('#deleteModal').modal('toggle');
        });
    });
</script>

@livewireScripts