window.addEventListener("load", function() {
    // Get the update user form element
    var updateUserForm = document.querySelector(".update-user-form");

    // Initially hide the update user form
    updateUserForm.style.display = "none";

    // Function to toggle the display of the update user form
    function toggleUpdateUserForm(userId) {
        if (updateUserForm.style.display === "none") {
            updateUserForm.style.display = "block";
    
            var nom = document.querySelector('.placeinfo-nom[data-user-id="' + userId + '"]').value;
            var email = document.querySelector('.placeinfo-email[data-user-id="' + userId + '"]').value;
            var password = document.querySelector('.placeinfo-password[data-user-id="' + userId + '"]').value;
            var state = document.querySelector('.placeinfo-state[data-user-id="' + userId + '"]').value;
    
            document.getElementById("id_user_update").value = userId;
            document.getElementById("nom_update").value = nom;
            document.getElementById("email_update").value = email;
            document.getElementById("password_update").value = password;
            document.getElementById("state_update").value = state;
        } else {
            updateUserForm.style.display = "none";
        }
    }
    // Add a click event listener to the update button
    var updateButtons = document.getElementsByClassName("update-button");
    for (var i = 0; i < updateButtons.length; i++) {
        updateButtons[i].addEventListener("click", function(event) {
            var userId = event.target.dataset.userId;
            toggleUpdateUserForm(userId);
        });
    }
});
    function toggleAddUserForm() {
        var addUserForm = document.querySelector(".add-user-form");
      
        if (addUserForm.style.display === "none") {
          addUserForm.style.display = "block";
        } else {
          addUserForm.style.display = "none";
        }
      }

   