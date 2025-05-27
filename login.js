function setRandomBackground() {
  const images = ["Immagini_sfondo_accesso/banner1.jpeg",
                  "Immagini_sfondo_accesso/banner2.jpeg",
                  "Immagini_sfondo_accesso/banner3.jpeg",
                  "Immagini_sfondo_accesso/banner4.jpeg",
                  "Immagini_sfondo_accesso/banner5.jpeg"];
  const randomImage = images[Math.floor(Math.random() * images.length)];
  document.body.style.backgroundImage = `url('${randomImage}')`;
}
  
setRandomBackground();

/***************************************************************************/
  
function showRegisterForm() {
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");
  
  loginForm.classList.add("hidden");
  registerForm.classList.remove("hidden");
  
  localStorage.setItem("formToShow", "register");
}
  
function showLoginForm() {
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");
 
  registerForm.classList.add("hidden");
  loginForm.classList.remove("hidden");
  
  localStorage.setItem("formToShow", "login");
}
  
  
const registerLinks = document.querySelectorAll(".show-register");
const loginLinks = document.querySelectorAll(".show-login");
  
for (let link of registerLinks) {
  link.addEventListener("click", showRegisterForm);
}
  
for (let link of loginLinks) {
  link.addEventListener("click",showLoginForm);
}

function restoreFormState() {
  const formToShow = localStorage.getItem("formToShow");

  if (formToShow === "register") {
    showRegisterForm();
  } else {
    showLoginForm();
  }
}
restoreFormState();

  
/***************************************************************************/
function showPassword(event) {
  const occhio = event.currentTarget;
  const container = occhio.closest('.password-container');
  const passwordInput = container.querySelector('input[type="password"], input[type="text"]');

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    occhio.src = "Immagini_sfondo_accesso/occhio.png";
  } else {
    passwordInput.type = "password";
    occhio.src = "Immagini_sfondo_accesso/occhio_chiuso.png";
  }
}

const occhi = document.querySelectorAll(".password-container img");
occhi.forEach(img => {
  img.addEventListener('click', showPassword);
});


/************************************REGISTRATI***************************************/
function checkName(event) {
    const input = event.currentTarget;
    
    if (formStatus.nome = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}
const formStatus = {};
document.querySelector('.nome input').addEventListener('blur', checkName);



function checkSurname(event) {
    const input = event.currentTarget;
    
    if (formStatus.cognome = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
}
document.querySelector('.cognome input').addEventListener('blur', checkSurname);


function jsonCheckUsername(json) {
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('errorj');
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
    }
}


function jsonCheckEmail(json) {
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }
}


function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}



function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.classList.add('errorj');
        formStatus.username = false;

    } else {
        fetch("api/check_username.php?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}
document.querySelector('.username input').addEventListener('blur', checkUsername);



function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;

    } else {
        fetch("api/check_email.php?q="+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}
document.querySelector('.email input').addEventListener('blur', checkEmail);


function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }
}
document.querySelector('.password input').addEventListener('blur', checkPassword);


function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirm_password = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
    }
}
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);


function checkSignup(event) {
    const checkbox = document.querySelector('.allow input');
    formStatus[checkbox.name] = checkbox.checked;
    if (Object.keys(formStatus).length !== 7 || Object.values(formStatus).includes(false)) {
        event.preventDefault();
    }
}
document.forms['form_registrazione'].addEventListener('submit', checkSignup);

/************************************LOGIN***************************************/
