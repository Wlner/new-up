<script>
    document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.processed', (component) => {
        setTimeout(function() {
          $('#alert').fadeOut('fast');
        }, 5000);
      });
    });

    window.livewire.on('closeDeadModal', () => {
      $('#deadModal').modal('hide');
    });

    window.livewire.on('openDeadModal', () => {
      $('#deadModal').modal('show');
    });
  </script>
