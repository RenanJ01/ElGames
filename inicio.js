//Slider - Cabeçalho

let slideId = 1;
mostrar_sld(slideId);

// Proximo/Anterior Controles
function plusSlides(n) {
  mostrar_sld(slideId += n);
}
function currentSlide(n) {
  mostrar_sld(slideId = n);
}

function mostrar_sld(n) {
  let i;
  let slides = document.getElementsByClassName("sld_img");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideId = 1}
  if (n < 1) {slideId = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideId-1].style.display = "block";
  dots[slideId-1].className += " active";
}