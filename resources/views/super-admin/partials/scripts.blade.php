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
    // super-admin => Role Section
    document.addEventListener('livewire:init', () => {
        Livewire.on('createRoleModal', (event) => {
            $('#createModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteRoleModal', (event) => {
            $('#deleteModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('editRoleModal', (event) => {
            $('#editModal').modal('toggle');
        });
    });
    // super-admin => Users Section
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteRoleModal', (event) => {
            $('#deleteModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('editUserRoleModal', (event) => {
            $('#editModal').modal('toggle');
        });
    });
</script>

@livewireScripts