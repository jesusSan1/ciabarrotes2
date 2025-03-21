class Images extends HTMLElement {
  constructor() {
    super();
    this.imagen = this.getAttribute("imagen");
    // Si el atributo seleccionado existe, se añade checked al input
    this.seleccionado = this.getAttribute("seleccionado") ? "checked" : "";
  }

  connectedCallback() {
    this.innerHTML = /*html*/ `
      <input type="radio" name="img" class="image" value="${this.imagen}" ${this.seleccionado}>
      <label class="custom-control custom-radio">
          <span class="custom-control-indicator"></span>
          <img src="${this.imagen}" alt="" class="img-fluid" width="150" height="150">
      </label>`;
  }
}

window.customElements.define("mi-imagen", Images);
