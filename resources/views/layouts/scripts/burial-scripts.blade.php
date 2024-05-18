<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeBurialModal', () => {
        $('#burialModal').modal('hide');
    });
    window.livewire.on('openBurialModal', () => {
        $('#burialModal').modal('show');
    });

</script>
