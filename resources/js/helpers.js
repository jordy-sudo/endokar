export function validateInputField(inputId, maxLength, allowNonNumeric) {
    document.getElementById(inputId).addEventListener('input', function (event) {
        let inputValue = event.target.value;

        if (!allowNonNumeric) {
            inputValue = inputValue.replace(/\D/g, '');
        }

        inputValue = inputValue.slice(0, maxLength);

        event.target.value = inputValue;
    });
}