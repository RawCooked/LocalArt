   function validateSignupForm() {
      var username = document.getElementById("txt").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("pswd").value;
      var signupErrorElement = document.getElementById("signup-error");

      signupErrorElement.innerHTML = ""; // Clear any previous error messages

      if (username.length === 0) {
        signupErrorElement.innerHTML = "Le champ nom est obligatoire.";
        return false;
      }

      if (email.length === 0) {
        signupErrorElement.innerHTML = "Le champ e-mail est obligatoire.";
        return false;
      }

      if (password.length === 0) {
        signupErrorElement.innerHTML = "Le champ mot de passe est obligatoire.";
        return false;
      }

      if (username.length > 20) {
        signupErrorElement.innerHTML = "Le nom ne doit pas dépasser 20 caractères.";
        return false;
      }

      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      if (!email.match(emailPattern)) {
        signupErrorElement.innerHTML = "L'e-mail n'est pas au bon format.";
        return false;
      }

      var passwordPattern = /^(?=.*[A-Z])(?=.*\d)/;
      if (!password.match(passwordPattern)) {
        signupErrorElement.innerHTML = "Le mot de passe doit contenir au moins une lettre majuscule et au moins un chiffre.";
        return false;
      }

      localStorage.setItem("name", 'username');
      

      return true;
    }

function validateLoginForm() {
            var loginEmail = document.getElementById("login-email").value;
            var loginPassword = document.getElementById("login-pswd").value;
            var loginErrorElement = document.getElementById("login-error");

            loginErrorElement.innerHTML = ""; // Clear any previous error messages

            if (loginEmail.length === 0 || loginPassword.length === 0) {
                loginErrorElement.innerHTML = "Email and password are required.";
                return false;
            }

            localStorage.setItem("myKey", loginEmail);
            return true;
        }