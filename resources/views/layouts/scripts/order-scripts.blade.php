<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeOrderModal', () => {
        $('#orderModal').modal('hide');
    });
    window.livewire.on('openOrderModal', () => {
        $('#orderModal').modal('show');
    });

</script>
