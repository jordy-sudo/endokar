import { validateInputField } from "./helpers";

$(document).ready(function () {
    validateInputField('telefono', 10, false);
    validateInputField('ruc', 13, false);
    validateInputField('celular', 10, false);

    // Text fields
    validateInputField('direccion', 60, true);
    validateInputField('sitio_web', 100, true);
    validateInputField('observaciones', 100, true);
    validateInputField('razon_social', 38, true);
    validateInputField('geolocalizacion', 60, true);
    validateInputField('email_retenciones', 241, true);
    validateInputField('nombre_comercial', 60, true);
});


document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('buscador');
    const select = document.getElementById('industria');

    searchInput.addEventListener('input', function() {
        const filter = searchInput.value.toLowerCase();
        const options = select.querySelectorAll('optgroup');

        options.forEach(function(optgroup) {
            const visible = optgroup.label.toLowerCase().includes(filter);
            optgroup.style.display = visible ? 'block' : 'none';
        });
    });
});


