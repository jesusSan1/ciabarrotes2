class Modulos extends HTMLElement {
  constructor() {
    super();
    this.color = this.getAttribute("color");
    this.link = this.getAttribute("link");
    this.titulo = this.getAttribute("titulo");
    this.subtitulo = this.getAttribute("subtitulo");
    this.logo = this.getAttribute("logo");
  }

  connectedCallback() {
    this.innerHTML = `
        <div class="card border-left-${this.color} shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="${this.link}">
                            <div class="text-xs font-weight-bold text-${this.color} text-uppercase mb-1">
                                ${this.titulo}
                            </div>
                        </a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a href="${this.link}">
                                <p class="text-${this.color}">${this.subtitulo}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="${this.link}">
                            <i class="${this.logo} fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    `;
  }
}

window.customElements.define("mi-modulo", Modulos);
