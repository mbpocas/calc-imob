document.addEventListener('DOMContentLoaded', function () {
    const numericFields = ['renda', 'price', 'parcela', 'sub_com', 'sub_sem'];

    numericFields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        field.addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9.]/g, '');
            if (this.value.split('.').length > 2) {
                this.value = this.value.replace(/\.+$/, "");
            }
        });
    });

    const jurosField = document.getElementById('juros');
    jurosField.addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9.]/g, '');
        if (this.value.split('.').length > 2) {
            this.value = this.value.replace(/\.+$/, "");
        }
    });
});