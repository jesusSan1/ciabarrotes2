const tieneFecha = document.querySelector("#tiene-caducidad");
const fechaCaducidad = document.querySelector("#fecha-caducidad");

const toggleFechaCaducidad = () => {
  fechaCaducidad.disabled = tieneFecha.value !== "1";
};

tieneFecha.addEventListener("change", toggleFechaCaducidad);
toggleFechaCaducidad();
