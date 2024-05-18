<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (component) => {
            setTimeout(function() {
                $('#alert').fadeOut('fast');
            }, 5000);
        });
    });

    window.livewire.on('closeReservationModal', () => {
        $('#reservationModal').modal('hide');
    });
    window.livewire.on('openReservationModal', () => {
        $('#reservationModal').modal('show');
    });

</script>
