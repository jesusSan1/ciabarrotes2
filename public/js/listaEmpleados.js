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

document.querySelectorAll(".eliminar").forEach((element) => {
  element.addEventListener("click", (e) => {
    const tr = element.parentNode.parentNode;
    const id = tr.children[0].children[0].value;
    Swal.fire({
      title: "Eliminar empleado",
      text: "¿deseas eliminar el empleado?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#666666",
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "post",
          url: "eliminarEmpleado",
          data: {
            id,
          },
          success: function (response) {
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: false,
              didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
              },
            });
            Toast.fire({
              icon: "success",
              title: "Empleado eliminado correctamente",
            });
            tr.remove();
          },
        });
      }
    });
  });
});
