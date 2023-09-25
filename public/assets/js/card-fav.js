/**
 * Form Basic Inputs
 */

'use strict';

document.addEventListener('DOMContentLoaded', function () {
    const favButtons = document.querySelectorAll('.fav-button');

    favButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cardId = button.getAttribute('data-card-id');
            setFav(cardId);
        });
    });

    function setFav(cardId) {
        const formData = new FormData();

        fetch('/fav-card/' + cardId, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (response.ok) {
                // Actualizar la interfaz de usuario para reflejar el voto exitoso
                console.log(`Voto exitoso para la publicación ${cardId}`);
            } else {
                // Manejar errores de respuesta aquí
                console.error(`Error en el voto para la publicación ${cardId}`);
            }
        })
        .catch(error => {
            // Manejar errores de red aquí
            console.error('Error de red:', error);
        });
    }
});
