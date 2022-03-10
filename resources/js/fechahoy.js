class FechaHoy extends HTMLElement {
    constructor() {
      super();
      let shadowRoot = this.attachShadow({mode: 'open'});
      shadowRoot.innerHTML = `<div>${this.fecha()}</div>`;
    }
    fecha() {
      var hoy = new Date();
      var dia = String(hoy.getDate());
      var mes = String(hoy.getMonth() + 1);
      var ano = hoy.getFullYear();
      return `${dia}-${mes}-${ano}`;
    }
  }
  window.customElements.define('fecha-hoy', FechaHoy);