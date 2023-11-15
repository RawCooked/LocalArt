function validerNom() {
    var nom = document.getElementById('nom'); // Remplacez 'nom' par l'ID de votre champ de nom
    var nomValue = nom.value.trim();
    
    // Le nom peut contenir des lettres et des espaces, avec une longueur maximale de 40 caractères
    var nomPattern = /^[A-Za-z\s]{1,40}$/;

    var msgNom = document.getElementById('mynom'); // Remplacez 'mynom' par l'ID de votre message d'erreur
    
    if (nomValue === '') {
        msgNom.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    } else if (nomPattern.test(nomValue)) {
        msgNom.innerHTML = '<span style="color: green">Correct</span>';
        return true; // La validation est réussie, permet la soumission du formulaire
    } else {
        msgNom.innerHTML = '<span style="color: red">Le nom ne doit contenir que des lettres et des espaces, avec une longueur maximale de 40 caractères.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    }
}

/*
function validerNom() {
    var nom = document.getElementById('nom'); // Remplacez 'nom' par l'ID de votre champ de nom
    var nomValue = nom.value.trim();
    
    var nomPattern = /^[A-Za-z]{1,40}$/; // Le nom ne doit contenir que des lettres et avoir une longueur maximale de 15 caractères
    
    var msgNom = document.getElementById('mynom'); // Remplacez 'mynom' par l'ID de votre message d'erreur
    
    if (nomValue === '') {
        msgNom.innerHTML = '<span style="color: red">Ce champ est obligatoire.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    } else if (nomPattern.test(nomValue)) {
        msgNom.innerHTML = '<span style="color: green">Correct</span>';
        return true; // La validation est réussie, permet la soumission du formulaire
    } else {
        msgNom.innerHTML = '<span style="color: red">Le nom ne doit contenir que des lettres et avoir une longueur maximale de 40 caractères.</span>';
        return false; // La validation a échoué, empêche la soumission du formulaire
    }
}


*/
        
        var form = document.getElementById('myForm');
       
        function validerTexte() {
          var texte = document.getElementById('texte');
          var texteValue = texte.value.trim();
      
          var msgTexte = document.getElementById('mytexte');
      
          if (texteValue === "") {
              msgTexte.innerHTML = '<span style="color: red">Le texte ne peut pas être vide.</span>';
              return false;
          } else if (/\d/.test(texteValue)) {
              msgTexte.innerHTML = '<span style="color: red">Le texte ne peut pas contenir d\'entiers.</span>';
              return false;
          } else {
              msgTexte.innerHTML = 'correct';
              return true;
          }
      }
      function validerObjet() {
        var objet = document.getElementById('sujet');
        var objetValue = objet.value;
    
        var msgObjet = document.getElementById('myobjet');
    
        if (objetValue === "") {
            msgObjet.innerHTML = '<span style="color: red">L\'objet est obligatoire.</span>';
            return false;
        } else {
            msgObjet.innerHTML = 'correct';
            return true;
        }
    }
   
  
 
 
  


// Écouter l'événement de soumission du formulaire


    form.addEventListener('submit', function(e) {
         // Empêcher la soumission du formulaire par défaut
  
      if (!validerNom() || !validerTexte() || !validerObjet() ) {
          e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
      }
  });
  
  
  // Add the "slide-from-left" class to the form container
  document.querySelector('.form-container').classList.add('slide-from-left');
  
  // Add the "slide-from-right" class to the image
  document.querySelector('.img').classList.add('slide-from-right');

