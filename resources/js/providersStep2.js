import { validateInputField } from "./helpers";


$(document).ready(function () {
    // Text fields
    validateInputField('vendedor', 60, true);
    validateInputField('vendedor_reemplazo', 60, true);
    validateInputField('email_ventas', 30, true);
    validateInputField('horario_atencion', 30, true);


    validateInputField('telefono_vendedor', 30, false);
    validateInputField('extension', 10, false);
    validateInputField('celular', 30, false);
});
