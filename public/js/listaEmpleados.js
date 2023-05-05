async function enviarDatos(id, habilitado) {
  $.ajax({
    type: "post",
    url: "accesoEmpleado",
    data: {
      id,
      habilitado,
    },
    success: function (response) {},
  });
}

document.querySelectorAll(".habilitar").forEach((element) => {
  element.addEventListener("change", (e) => {
    const tr = e.target.parentNode.parentNode;
    const id = tr.children[0].children[0].value;
    let habilitado;
    if (e.target.checked) {
      $(tr).find("td label.habilitar").show();
      $(tr).find("td label.deshabilitar").hide();
      habilitado = 1;
      enviarDatos(id, habilitado);
    } else {
      $(tr).find("td label.habilitar").hide();
      $(tr).find("td label.deshabilitar").show();
      habilitado = 0;
      enviarDatos(id, habilitado);
    }
  });
});
