import { validateInputField } from "./helpers";


$(document).ready(function () {
    // Text fields
    validateInputField('banco', 15, true);
    validateInputField('tipo_cuenta', 2, true);


    validateInputField('numero_cuenta_bancaria', 18, false);

});
