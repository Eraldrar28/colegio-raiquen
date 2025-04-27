function ShowHide() {
  var container = document.getElementById("container");
  var btn = document.getElementById("btnShow");

  container.classList.toggle('show');

  if (container.classList.contains('show')) {
    btn.innerHTML = "Ocultar noticias";
  } else {
    btn.innerHTML = "Ver más noticias";
  }
}
