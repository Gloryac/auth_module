// const signUpButton=document.getElementById('signUpButton');
// const signInButton=document.getElementById('sigInButton');
// const signInForm=document.getElementById('signIn');
// const signUpForm=document.getElementById('signup');


// signUpButton.addEventListener('click',function(){
//     signInForm.style.display="none";
//     signUpForm.style.display="block";
// })

// signInButton.addEventListener('click',function(){
//     signInForm.style.display="block";
//     signUpForm.style.display="none";
// })


const eyeIcon = document.getElementById("eye");
const passwordField = document.getElementById("password");
eyeIcon.addEventListener("click", () => {
  if (passwordField.type === "password" && passwordField.value) {
    passwordField.type = "text";
    eyeIcon.classList.remove("fa-eye");
    eyeIcon.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    eyeIcon.classList.remove("fa-eye-slash");
    eyeIcon.classList.add("fa-eye");
  }
});