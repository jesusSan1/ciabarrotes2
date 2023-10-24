async function enviarDatos(id, habilitado, csrfName, csrfHash) {
  $.ajax({
    type: "post",
    url: "accesoEmpleado",
    data: {
      id,
      habilitado,
      [csrfName]: csrfHash,
    },
    dataType: "json",
    success: function (response) {
      $(".txt_csrfname").val(response.token);
    },
  });
}

document.querySelectorAll(".habilitar").forEach((element) => {
  element.addEventListener("change", (e) => {
    var csrfName = $(".txt_csrfname").attr("name"); // CSRF Token name
    var csrfHash = $(".txt_csrfname").val(); // CSRF hash
    const tr = e.target.parentNode.parentNode;
    const id = tr.children[0].children[0].value;
    let habilitado;
    if (e.target.checked) {
      $(tr).find("td label.habilitar").show();
      $(tr).find("td label.deshabilitar").hide();
      habilitado = 1;
      enviarDatos(id, habilitado, csrfName, csrfHash);
    } else {
      $(tr).find("td label.habilitar").hide();
      $(tr).find("td label.deshabilitar").show();
      habilitado = 0;
      enviarDatos(id, habilitado, csrfName, csrfHash);
    }
  });
});

document.querySelectorAll(".eliminar").forEach((element) => {
  element.addEventListener("click", (e) => {
    e.preventDefault();
    const tr = element.parentNode.parentNode;
    const formulario = tr.children[0];
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
        formulario.submit();
        // $.ajax({
        //   type: "post",
        //   url: "eliminarEmpleado",
        //   data: {
        //     id,
        //   },
        //   success: function (response) {
        //     const Toast = Swal.mixin({
        //       toast: true,
        //       position: "top-end",
        //       showConfirmButton: false,
        //       timer: 3000,
        //       timerProgressBar: false,
        //       didOpen: (toast) => {
        //         toast.addEventListener("mouseenter", Swal.stopTimer);
        //         toast.addEventListener("mouseleave", Swal.resumeTimer);
        //       },
        //     });
        //     Toast.fire({
        //       icon: "success",
        //       title: "Empleado eliminado correctamente",
        //     });
        //     tr.remove();
        //   },
        // });
      }
    });
  });
});
