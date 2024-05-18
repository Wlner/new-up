<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function () {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeMapModal', () => {
        $('#mapModal').modal('hide');
    });

    window.livewire.on('openMapModal', () => {
        $('#mapModal').modal('show');
    });
</script>
