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
    const tr = element.parentNode.parentNode;
    const id = tr.children[0].children[0].value;
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
        $.ajax({
          type: "post",
          url: "eliminarCategoria",
          data: { id },
          success: function (response) {
            tr.remove();
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
              title: "Elminado correctamente",
            });
          },
        });
      }
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

document.querySelectorAll(".guardar-categoria").forEach((element) => {
  element.addEventListener("click", () => {
    const tr = element.parentNode.parentNode;
    const id = tr.children[0].children[0].value;
    const valor = tr.children[0].children[2].value;
    const label = tr.children[0].children[1];
    $.ajax({
      type: "post",
      url: "editarCategoria",
      data: { id, valor },
      success: function (response) {
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
