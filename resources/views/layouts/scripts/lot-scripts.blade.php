<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeLotModal', () => {
        $('#lotModal').modal('hide');
    });
    window.livewire.on('openLotModal', () => {
        $('#lotModal').modal('show');
    });

</script>
