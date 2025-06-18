import { singInLogin } from "./auth/login.js";
import { singOutLogin } from "./auth/logOut.js";

document.addEventListener('DOMContentLoaded', () =>{
    if(document.getElementById('loginForm')){
        singInLogin();
    }

    if(document.getElementById("log-out")){
        singOutLogin();
    }
});

console.log("Ha cargado el script");