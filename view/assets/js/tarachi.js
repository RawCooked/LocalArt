// Attendez que le document soit prêt
$(document).ready(function () {
    // Sélectionnez le texte "Contactez Nous"
    var contactText = document.getElementById("contactText");

    // Définissez la position de départ (à gauche)
    var currentPosition = 0;

    // Définissez la position cible (au centre)
    var targetPosition = window.innerWidth / 2 - contactText.clientWidth / 2;

    // Fonction pour animer la translation
    function animate() {
        // Déplacez progressivement le texte vers la droite
        currentPosition += 2; // Ajustez la vitesse de translation ici

        // Mettez à jour la position du texte
        contactText.style.left = currentPosition + "px";

        // Continuez l'animation jusqu'à atteindre la position cible
        if (currentPosition < targetPosition) {
            requestAnimationFrame(animate);
        }
    }

    // Démarrez l'animation lorsque le document est prêt
    animate();
});

