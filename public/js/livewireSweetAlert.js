window.addEventListener('swalConfirm', function (event) {
  var key = event.detail.key;
  var model = event.detail.model;
  swal({
    title: 'Tem certeza?',
    text: "Você não será capaz de recuperar depois!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#0CC27E',
    cancelButtonColor: '#FF586B',
    confirmButtonText: 'Sim, excluir!',
    cancelButtonText: 'Não, cancelar!',
    confirmButtonClass: 'btn btn-success mr-5',
    cancelButtonClass: 'btn btn-danger',
    buttonsStyling: false
  }, function (isConfirm) {
    if (isConfirm) {
      Livewire.emit('destroy' + model, key);
    }
    /* swal(
        'Deleted!',
        'Your imaginary file has been deleted.',
        'success'
    ) */

  });
});