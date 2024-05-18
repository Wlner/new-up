<script>
    document.addEventListener("DOMContentLoaded", () => {
      Livewire.hook('message.processed', (component) => {
        setTimeout(function() {
          $('#alert').fadeOut('fast');
        }, 5000);
      });
    });
  
    window.livewire.on('closeVisitorModal', () => {
      $('#visitorModal').modal('hide');
    });
  
    window.livewire.on('openVisitorModal', () => {
      $('#visitorModal').modal('show');
    });
  </script>