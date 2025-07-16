
$(document).ready(function () {
  
  $('.money_mask').mask('000.000.000.000.000,00', { reverse: true });
  const toast = document.getElementById('toast');
  if (toast) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast);
    toastBootstrap.show();
  }
  
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function () {
      const submitButtons = form.querySelectorAll('button[type="submit"]');
      submitButtons.forEach(button => {
        button.disabled = true;
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Salvando...';
      });
    });
  });
  
  // $.ajaxSetup({
  //   headers: {
  //     'X-CSRF-Token': document.head.querySelector('meta[name="csrf-token"]').content
  //   }
  // });
  // const widthWindow = screen.width;
  // if (widthWindow < 768) {
  //   $('#entregamos').hide();
  // } else {
  //   $('#entregamos').show();
  // }
});
