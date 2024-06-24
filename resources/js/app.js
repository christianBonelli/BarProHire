import './bootstrap';


document.addEventListener('DOMContentLoaded', function () {
    const description = document.getElementById('description');
    const charCount = document.getElementById('charCount');

    // Funzione per aggiornare il contatore di caratteri
    function updateCharCount() {
        const currentLength = description.value.length;
        const maxLength = description.getAttribute('maxlength');
        charCount.textContent = `${currentLength}/${maxLength} caratteri`;
    }

    // Aggiorna il contatore all'inizializzazione
    updateCharCount();

    // Ascolta l'evento input per aggiornare il contatore dinamicamente
    description.addEventListener('input', updateCharCount);
});



