// animations.js

// Attendez que le document soit prêt
$(document).ready(function () {
    // Sélectionnez le bouton et l'élément que vous souhaitez animer
    var animateButton = $("#animateButton");
    var elementToAnimate = $("#elementToAnimate");

    // Attachez un gestionnaire d'événements "click" au bouton
    animateButton.on("click", function () {
        // Ajoutez une classe CSS pour l'animation à l'élément
        elementToAnimate.addClass("animated-class");
    });
});
