document.querySelectorAll(".eliminar-producto").forEach((e) => {
  e.addEventListener("click", () => {
    const tr = e.parentNode.parentNode;
    const id = tr.children[0].children[0].value;
    Swal.fire({
      title: "Eliminar producto",
      text: "¿deseas eliminar el producto?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#666",
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        tr.remove();
        $.ajax({
          type: "post",
          url: "eliminar-producto",
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
              title: "Eliminado correctamente",
            });
          },
        });
      }
    });
  });
});
