const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener("click", () => {
    console.log("click");
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

   
});

const form = document.querySelector('#form');
form.addEventListener('submit', ()=> {
    e.preventDefault();
})


