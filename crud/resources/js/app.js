import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    const inputTypeSelect = document.getElementById('input_type');
    const cpfOrCnpjInput = document.getElementById('cpf_or_cnpj');

    inputTypeSelect.addEventListener('change', function() {
        if (this.value === 'cpf') {
            cpfOrCnpjInput.mask('000.000.000-00');
        } else {
            cpfOrCnpjInput.mask('00.000.000/0000-00');
        }
    });

    // Set the initial mask based on the selected option
    inputTypeSelect.dispatchEvent(new Event('change'));
});