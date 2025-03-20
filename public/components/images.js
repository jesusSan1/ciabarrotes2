class Images extends HTMLElement {
  constructor() {
    super();
    this.imagen = this.getAttribute("imagen");
  }

  connectedCallback() {
    this.innerHTML = /*html*/ `
    <input type="radio" name="img" class="image" value="${this.imagen}">
                <label class="custom-control custom-radio">
                    <span class="custom-control-indicator"></span>
                    <img src="${this.imagen}" alt="" class="img-fluid" width="150" height="150">
                </label>`;
  }
}
window.customElements.define("mi-imagen", Images);
