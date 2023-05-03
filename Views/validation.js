const hostInput = document.querySelector('#host');
const nomEventInput = document.querySelector('#nomEvent');
const date_dInput = document.querySelector('#date_d');
const date_fInput = document.querySelector('#date_f');
const lieuInput = document.querySelector('#lieu');
const categorieInput = document.querySelector('#Categorie');
const programmationInput = document.querySelector('#programmation');
const descriptionInput = document.querySelector('#description');
const afficheInput = document.querySelector('#affiche');
const numTelInput = document.querySelector('#numTel');
const emailInput = document.querySelector('#email');
const prixInput = document.querySelector('#prix');
const form = document.querySelector('form');
function validateForm() {

    let errors = [];
    console.log('Validating form');
    if (hostInput.value.trim() === '') {
      errors.push('Le champ "Hôte" est obligatoire.');
    }
  
    if (nomEventInput.value.trim() === '') {
      errors.push('Le champ "Nom de l\'événement" est obligatoire.');
    }
  
    if (date_dInput.value.trim() === '') {
      errors.push('Le champ "Date de début" est obligatoire.');
    }
  
    if (date_fInput.value.trim() === '') {
      errors.push('Le champ "Date de fin" est obligatoire.');
    }
  
    if (lieuInput.value.trim() === '') {
      errors.push('Le champ "Lieu" est obligatoire.');
    }
  
    if (categorieInput.value.trim() === '') {
        errors.push('Le champ "Categorie" est obligatoire.');
      }

    if (programmationInput.value.trim() === '') {
      errors.push('Le champ "Programmation" est obligatoire.');
    }
  
    if (descriptionInput.value.trim() === '') {
      errors.push('Le champ "Description" est obligatoire.');
    }
  
    if (afficheInput.value.trim() === '') {
      errors.push('Le champ "Affiche" est obligatoire.');
    }
  
    if (numTelInput.value.trim() === '') {
      errors.push('Le champ "Numéro de téléphone" est obligatoire.');
    } else if (!/^[0-9]{8}$/.test(numTelInput.value)) {
      errors.push('Veuillez entrer un numéro de téléphone valide (8 chiffres)');
    }
  
    if (emailInput.value.trim() === '') {
      errors.push('Le champ "Email" est obligatoire.');
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
      errors.push('Veuillez entrer une adresse email valide');
    }
  
    if (prixInput.value.trim() === '') {
      errors.push('Le champ "Prix" est obligatoire.');
    } else if (isNaN(prixInput.value)) {
      errors.push('Le prix doit être un nombre.');
    }
  
    if (errors.length > 0) {
        alert(errors.join('\n'));
        return false;
      }
      
      return true;
    }
  
  form.addEventListener('submit', (e) => {
    console.log('Form submitted');
    if (!validateForm()) {
      e.preventDefault();
    }
  });
  
  