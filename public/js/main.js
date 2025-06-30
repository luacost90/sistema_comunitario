import { singInLogin } from "./auth/login.js";
import { singOutLogin } from "./auth/logOut.js";
import { actualizar } from "./residentes/actualizar.js";
import { editar } from "./residentes/editar.js";
import { eliminar } from "./residentes/eliminar.js";
import { filtrar } from "./residentes/filtrar.js";
import { listar } from "./residentes/listar.js";
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

    if(document.getElementById("residentesTable")){
        listar();
        editar();
        eliminar();
    }

    if(document.getElementById("editar__form")){
        actualizar();
    }

    if(document.getElementById("filtroResidentesForm")){
        filtrar();
    }

    
});

