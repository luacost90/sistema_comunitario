import { post } from "../utils/api.js";

export function registrarResidente(){
    const form = document.getElementById("registrar__form");

    form.addEventListener("submit", async e =>{
        e.preventDefault();
        // Expresiones regulares para validación
        const cedulaRegex = /^(V|E)-\d{7,9}$/i; // Ejemplo: V-12345678 o E-12345678
        const telefonoRegex = /^0(2(12|14|16|24|26)|4(12|14|16|24|26))-\d{7}$/; // Ejemplo: 0412-1234567 o 0212-1234567

        // Validar cédula
        const cedula = form.cedula_residente.value.trim().toUpperCase();
        if (cedula !== "" && !cedulaRegex.test(cedula)) {
            alert('Cédula inválida. Ejemplo: V-12345678 o E-12345678');
            return;
        }

        // Validar teléfono
        const telefono = form.telefono.value.trim();
        if (!telefonoRegex.test(telefono)) {
            alert('Teléfono inválido. Ejemplo: 0412-1234567 o 0212-1234567');
            return;
        }

        const data = {
            cedula_residente: cedula,
            nombre_residente: form.nombre_residente.value,
            apellido_residente: form.apellido_residente.value,
            fecha_nacimiento: form.fecha_nacimiento.value,
            direccion: form.direccion.value,
            telefono: telefono,
            embarazo: form.embarazo.checked ? 1 : 0,
            fk_genero: form.fk_genero.value
        };

        const response = await post('core/routes/api/createResidente.php', data);

        if(response.success){
            alert(response.message);
            form.reset();
        }else{
            alert(response.error);
        }
    });
}