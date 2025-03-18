async function enviarDatos(id, habilitado, csrfName, csrfHash) {
  fetch("accesoEmpleado", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      id,
      habilitado,
      [csrfName]: csrfHash,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      // Actualizar el token CSRF en el input hidden
      const csrfInput = document.querySelector(".txt_csrfname");
      if (csrfInput) csrfInput.value = data.token;
    })
    .catch((error) => console.error("Error al enviar los datos:", error));
}

document.querySelectorAll(".habilitar").forEach((element) => {
  element.addEventListener("change", (e) => {
    const csrfInput = document.querySelector(".txt_csrfname"); // CSRF input
    const csrfName = csrfInput.name;
    const csrfHash = csrfInput.value;

    const tr = e.target.closest("tr"); // Encuentra la fila <tr>
    const id = tr.querySelector("td input").value;
    let habilitado = e.target.checked ? 1 : 0;

    tr.querySelector("td label.habilitar").style.display = habilitado
      ? "inline-block"
      : "none";
    tr.querySelector("td label.deshabilitar").style.display = habilitado
      ? "none"
      : "inline-block";

    enviarDatos(id, habilitado, csrfName, csrfHash);
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
      }
    });
  });
});
