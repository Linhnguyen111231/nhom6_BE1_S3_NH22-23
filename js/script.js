const container = document.querySelector(".container");
const signInBtn = document.getElementById("signIn"); 
const signUpBtn = document.getElementById("signUp"); 


signUpBtn.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});
signInBtn.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});