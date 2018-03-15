/**
 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('object');

  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Condomínio #' + id);
  modal.find('#confirm').attr('href', 'deletarCondominio.php?id=' + id);
})