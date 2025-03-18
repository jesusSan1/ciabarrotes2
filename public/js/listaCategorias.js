function mostrarOcultar(tr, param1, param2) {
  // Verificar que tr tiene suficientes hijos
  if (!tr || tr.children.length < 5) return;

  const setDisplay = (parent, index1, index2, value1, value2) => {
    if (parent.children[index1]) parent.children[index1].style.display = value1;
    if (parent.children[index2]) parent.children[index2].style.display = value2;
  };

  setDisplay(tr.children[0], 1, 2, param1, param2);
  setDisplay(tr.children[2], 0, 1, param1, param2);
  setDisplay(tr.children[3], 0, 1, param1, param2);
  setDisplay(tr.children[4], 0, 1, param1, param2);
}

document.querySelectorAll(".editar-categoria").forEach((element) => {
  element.addEventListener("click", () => {
    let tr = element.closest("tr"); // Busca el tr más cercano en la jerarquía
    if (tr) {
      mostrarOcultar(tr, "none", "block");
    }
  });
});

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
  element.addEventListener("click", async () => {
    const tr = element.closest("tr"); // Obtiene el <tr> más cercano
    const id = tr.children[0].children[0].value;
    const valor = tr.children[0].children[2].value;
    const label = tr.children[0].children[1];

    // Obtener el token CSRF de un input hidden con la clase .txt_csrfname
    const csrfInput = document.querySelector(".txt_csrfname");
    const csrfName = csrfInput?.getAttribute("name"); // CSRF Token name
    const csrfHash = csrfInput?.value; // CSRF hash

    if (!csrfName || !csrfHash) {
      console.error("No se encontró el token CSRF.");
      return;
    }

    try {
      const response = await fetch("editarCategoria", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ id, valor, [csrfName]: csrfHash }),
      });

      const data = await response.json();

      // Actualizar el token CSRF
      csrfInput.value = data.token;

      // Actualizar la etiqueta con el nuevo valor
      label.textContent = valor;

      // Mostrar u ocultar elementos
      mostrarOcultar(tr, "block", "none");

      // Mostrar alerta con SweetAlert2
      Swal.fire({
        toast: true,
        position: "top-end",
        icon: "success",
        title: "Editado con éxito",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: false,
      });
    } catch (error) {
      console.error("Error al enviar la solicitud:", error);
    }
  });
});

document.querySelectorAll(".cancelar-categoria").forEach((element) => {
  element.addEventListener("click", () => {
    const tr = element.closest("tr");
    //mostrar ocultar
    mostrarOcultar(tr, "block", "none");
  });
});
