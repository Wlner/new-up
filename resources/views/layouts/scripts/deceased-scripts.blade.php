<script>
    document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.processed', (component) => {
        setTimeout(function() {
          $('#alert').fadeOut('fast');
        }, 5000);
      });
    });
  
    window.livewire.on('closeDeceasedModal', () => {
      $('#deceasedModal').modal('hide');
    });
  
    window.livewire.on('openDeceasedModal', () => {
      $('#deceasedModal').modal('show');
    });
  </script>