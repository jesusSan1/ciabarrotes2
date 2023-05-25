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
