$(".table").dataTable({
  lengthMenu: [
    [3, 5, 10, -1],
    [3, 5, 10, "Todos"],
  ],
  language: {
    zeroRecords: "No se encontraron resultados",
    lengthMenu: "Mostrar _MENU_ elementos",
    search: "Buscar:",
    paginate: {
      first: "Primero",
      previous: "Anterior",
      next: "Siguiente",
      last: "último",
    },
  },
  info: false,
  ordering: false,
  filter: true,
  bSort: false,
  order: [[0, "asc"]],

  buttons: {
    dom: {
      button: {
        className: "btn btn-primary btn-sm btn-rounded", //tipo de boton
      },
    },
  },
});
