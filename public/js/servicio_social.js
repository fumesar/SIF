
// Previsualizar Foto
function colocarFoto() {
    $imagenPrevisualizacion = document.querySelector(".img-thumbnail");
    var userFile = document.getElementById('Foto');
    userFile.src = URL.createObjectURL(event.target.files[0]);
    $imagenPrevisualizacion.src = userFile.src; 
}
// Al presionar X, limpiar Foto
function limpiarFoto () {
    $('.img-thumbnail').attr("src", "");
    $('#Foto').val('');
}
  