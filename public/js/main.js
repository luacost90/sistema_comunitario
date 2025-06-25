import { singInLogin } from "./auth/login.js";
import { singOutLogin } from "./auth/logOut.js";
import { registrarResidente} from "./residentes/registrar.js";

document.addEventListener('DOMContentLoaded', () =>{
    if(document.getElementById('loginForm')){
        singInLogin();
    }

    if(document.getElementById("log-out")){
        singOutLogin();
    }

    if(document.getElementById("registrar__form")){
        registrarResidente();
    }
});

console.log("Ha cargado el script");