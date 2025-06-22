$(document).ready(function () {
  // Agregar tarea
  $('#tareaForm').on('submit', function (e) {
    e.preventDefault();
    let texto = $('#tareaInput').val().trim();
    if (texto !== '') {
      let nuevaTarea = $(`
        <li class="fade-in">
          <span class="textoTarea">${texto}</span>
          <input type="text" class="editarInput" />
          <div class="acciones">
            <button class="completarBtn">✓</button>
            <button class="editarBtn">✏️</button>
            <button class="guardarBtn" style="display:none;">💾</button>
            <button class="eliminarBtn">🗑️</button>
          </div>
        </li>
      `);
      $('#listaTareas').append(nuevaTarea);
      nuevaTarea.fadeIn();
      $('#tareaInput').val('');
    }
  });

  // Marcar como completada
  $('#listaTareas').on('click', '.completarBtn', function () {
    $(this).closest('li').find('.textoTarea').toggleClass('completada');
  });

  // Eliminar tarea
  $('#listaTareas').on('click', '.eliminarBtn', function () {
    $(this).closest('li').fadeOut(function () {
      $(this).remove();
    });
  });

  // Editar tarea
  $('#listaTareas').on('click', '.editarBtn', function () {
    let li = $(this).closest('li');
    let texto = li.find('.textoTarea').text();
    li.find('.editarInput').val(texto).show();
    li.find('.textoTarea').hide();
    li.find('.editarBtn').hide();
    li.find('.guardarBtn').show();
  });

  // Guardar tarea editada
  $('#listaTareas').on('click', '.guardarBtn', function () {
    let li = $(this).closest('li');
    let nuevoTexto = li.find('.editarInput').val().trim();
    if (nuevoTexto !== '') {
      li.find('.textoTarea').text(nuevoTexto).show();
      li.find('.editarInput').hide();
      li.find('.guardarBtn').hide();
      li.find('.editarBtn').show();
    }
  });

  // Vaciar toda la lista
  $('#vaciarLista').on('click', function () {
    $('#listaTareas').fadeOut(300, function () {
      $(this).empty().show();
    });
  });
});
