const file = document.getElementById("image");
file.addEventListener("change", () => checkFileSize(file.files[0]));

function checkFileSize(image) {
  if (image.size > 2000000) {
    window.alert("Gekozen foto is te groot.\nKies een foto dat max 2mb is");
    document.getElementById("image").value = "";
  }
}
