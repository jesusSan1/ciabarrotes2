function mostrarOcultar(tr, param1, param2) {
  tr.children[0].children[1].style.display = param1;
  tr.children[0].children[2].style.display = param2;

  tr.children[3].children[0].style.display = param1;
  tr.children[3].children[1].style.display = param2;
  tr.children[4].children[0].style.display = param1;
  tr.children[4].children[1].style.display = param2;
}

document.querySelectorAll(".eliminar-categoria").forEach((element) => {
  element.addEventListener("click", (e) => {
    e.preventDefault();
    const tr = element.parentNode.parentNode;
    const formulario = tr.children[0];
    Swal.fire({
      title: "Eliminar categoria",
      text: "¿deseas eliminar la categoria?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#666666",
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        formulario.submit();
      }
    });
  });
});

document.querySelectorAll(".guardar-categoria").forEach((element) => {
  element.addEventListener("click", () => {
    const tr = element.parentNode.parentNode;
    const id = tr.children[0].children[0].value;
    const valor = tr.children[0].children[2].value;
    const label = tr.children[0].children[1];
    var csrfName = $(".txt_csrfname").attr("name"); // CSRF Token name
    var csrfHash = $(".txt_csrfname").val(); // CSRF hash
    $.ajax({
      type: "post",
      url: "editarCategoria",
      data: { id, valor, [csrfName]: csrfHash },
      dataType: "json",
      success: function (response) {
        $(".txt_csrfname").val(response.token);
        label.innerHTML = valor;
        //mostrar ocultar
        mostrarOcultar(tr, "block", "none");
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
          title: "Editado con exito",
        });
      },
    });
  });
});

document.querySelectorAll(".editar-categoria").forEach((element) => {
  element.addEventListener("click", () => {
    const tr = element.parentNode.parentNode;
    //ocultar mostrar
    mostrarOcultar(tr, "none", "block");
  });
});

document.querySelectorAll(".cancelar-categoria").forEach((element) => {
  element.addEventListener("click", () => {
    const tr = element.parentNode.parentNode;
    //mostrar ocultar
    mostrarOcultar(tr, "block", "none");
  });
});
