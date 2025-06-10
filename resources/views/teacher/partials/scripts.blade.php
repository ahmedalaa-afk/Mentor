<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('teacher-assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('teacher-assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('teacher-assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('teacher-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('teacher-assets') }}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('teacher-assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('teacher-assets') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('teacher-assets') }}/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>

    // teacher => Teacher Sectino
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
    
</script>

@livewireScripts