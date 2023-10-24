document.querySelectorAll(".eliminar-proveedor").forEach((item) => {
  item.addEventListener("click", (e) => {
    e.preventDefault();
    const tr = item.parentNode.parentNode;
    const formulario = tr.children[0];
    Swal.fire({
      title: "Eliminar proveedor",
      text: "¿deseas eliminar el usuario?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#666",
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        formulario.submit();
      }
    });
  });
});
