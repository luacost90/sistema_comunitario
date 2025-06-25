import { post } from "../utils/api.js";
import { showMessage } from "../utils/formHelpers.js";

export function registrarResidente(){
    const form = document.getElementById("registrar__form");

    form.addEventListener("submit", async e =>{
        e.preventDefault();

        const data = {
            cedula_residente: form.cedula_residente.value,
            nombre_residente: form.nombre_residente.value,
            apellido_residente: form.apellido_residente.value,
            fecha_nacimiento: form.fecha_nacimiento.value,
            direccion: form.direccion.value,
            telefono: form.telefono.value,
            embarazo: form.embarazo.checked ? 1 : 0,
            fk_genero: form.fk_genero.value
        };

        const response = await post('core/routes/api/createResidente.php', data);

        console.log(response);
        // if(response.success){
        //     showMessage(response.message, 'success');
        // }else{
        //     showMessage(response.error, 'danger');
        // }
    });
}