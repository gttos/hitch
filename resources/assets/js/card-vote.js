/**
 * Form Basic Inputs
 */

'use strict';

document.addEventListener('DOMContentLoaded', function () {
    const likeButtons = document.querySelectorAll('.like-button');
    const dislikeButtons = document.querySelectorAll('.dislike-button');

    likeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cardId = button.getAttribute('data-card-id');
            sendVote(cardId, 1);
        });
    });

    dislikeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cardId = button.getAttribute('data-card-id');
            sendVote(cardId, 0);
        });
    });

    function sendVote(cardId, vote) {
        const formData = new FormData();
        formData.append('vote', vote);

        fetch('/vote-card/' + cardId, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (response.ok) {
                // Actualizar la interfaz de usuario para reflejar el voto exitoso
                console.log(`Voto ${vote} exitoso para la publicación ${cardId}`);
            } else {
                // Manejar errores de respuesta aquí
                console.error(`Error en el voto ${vote} para la publicación ${cardId}`);
            }
        })
        .catch(error => {
            // Manejar errores de red aquí
            console.error('Error de red:', error);
        });
    }
});
