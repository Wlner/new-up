<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeBlockModal', () => {
        $('#blockModal').modal('hide');
    });
    window.livewire.on('openBlockModal', () => {
        $('#blockModal').modal('show');
    });

</script>
