const file = document.getElementById("image");
file.addEventListener("change", () => checkFileSize(file.files[0]));

function checkFileSize(image) {
  toastr.options = {
    "closeButton": true,
    "positionClass": "toast-top-full-width"   
  }
  if (image.size > 2000000) {
    toastr.warning('Gekozen foto is te groot. Kies een foto dat max 2mb is', 'Bericht');
    file.value = "";
  }
}
