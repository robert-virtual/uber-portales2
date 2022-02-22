// let CURRENT_USER;
const modalTitle = document.getElementById("modal-title");
const updateTitle = document.getElementById("update");
const nombre = document.getElementById("nombre");
const correo = document.getElementById("correo");
console.log("Js working");
const CURRENT_USER = new Proxy(
  {},
  {
    set(obj, prop, value) {
      obj[prop] = value;
      console.log("set", value);
      if (prop == "Nombre") {
        modalTitle.textContent = obj.Nombre;
        updateTitle.textContent = `Actualizar ${obj.Nombre}`;
        nombre.value = obj.Nombre;
      }
      if (prop == "Correo") {
        correo.value = obj.Correo;
      }
    },
    get(target, name) {
      return target[name];
    },
  }
);
