function validateForm() {
    if (!verifierAge()) {
        return false;
    }
    if (!validatePassword()) {
        return false;
    }
    // Récupérer le nom d'utilisateur
    var username = document.getElementById("uname").value;
    // Afficher le message de bienvenue avec le nom d'utilisateur pendant 3 secondes
    alert("engresistre " + username + " !");
    
        // Rediriger l'utilisateur vers la page frontstatique.php
        window.location.href = "login.php";
    ; // Attendre 3 secondes avant de rediriger l'utilisateur
    return true;
}

function isLetterKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))
      return false;
    return true;
  } 
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
  function validatePassword() {
    var password = document.getElementById("pswd").value;

    // Vérifier si le mot de passe contient au moins un caractère, un chiffre et une lettre majuscule
    if (!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])./)) {
        // Afficher un message d'erreur
        document.getElementById("pswd").setCustomValidity("Le mot de passe doit contenir au moins un caractère, un chiffre et une lettre majuscule.");

        // Empêcher le formulaire d'être soumis
        return false;
    }

    // Autoriser le formulaire à être soumis
    return true;
}
  
  // Exemple d'utilisation
  const password = document.getElementById("pswd").value;
  if (verifPassword(password)) {
    console.log("Mot de passe valide !");
  } else {
    console.log("Mot de passe invalide !");
  }
  
  function verifierAge() {
      // Récupérer la date de naissance entrée dans le champ de formulaire
      var dateNaissance = new Date(document.getElementById("dateN").value);
  
      // Calculer l'âge de l'utilisateur en années
      var age = new Date(Date.now() - dateNaissance.getTime()).getFullYear() - 1970;
  
      // Vérifier si l'utilisateur a plus de 18 ans
      if (age < 18) {
          // Afficher un message d'erreur
          alert("Vous devez avoir au moins 18 ans pour créer un compte.");
  
          // Empêcher le formulaire d'être soumis
          return false;
      }
  
      // Autoriser le formulaire à être soumis
      return true;
  }
  function validatePassword() {
    var password = document.getElementById("pswd").value;
    var confirmPassword = document.getElementById("re_password").value;
    if (password != confirmPassword) {
      alert("Les mots de passe ne correspondent pas.");
      return false;
    }
    return true;
  }
  
  
  