import { post } from "../utils/api.js";


export function actualizar(){
    const data = JSON.parse(sessionStorage.getItem('datosResidente'));
    const form = document.getElementById("editar__form");

    if(data){
        const residente = data.data;  
        console.log(residente);

        form.cedula_residente.value = residente.cedula_residente || '';
        form.nombre_residente.value = residente.nombre_residente || '';
        form.apellido_residente.value = residente.apellido_residente || '';
        form.fecha_nacimiento.value = residente.fecha_nacimiento || '';
        form.direccion.value = residente.direccion || '';
        form.telefono.value = residente.telefono || '';
        form.embarazo.checked = residente.embarazo === 1 || residente.embarazo === '1';
        form.fk_genero.value = residente.fk_genero || '';

       

        form.addEventListener("submit", async e =>{
            if (!confirm("¿Está seguro de que desea actualizar los datos del residente?")) {
                e.preventDefault();
            }

            e.preventDefault();
             const dataForm = {
                id_residente: residente.id_residente,
                cedula_residente:  form.cedula_residente.value.toUpperCase(),
                nombre_residente: form.nombre_residente.value,
                apellido_residente: form.apellido_residente.value,
                fecha_nacimiento: form.fecha_nacimiento.value,
                direccion: form.direccion.value,
                telefono: form.telefono.value,
                embarazo: form.embarazo.checked ? 1 : 0,
                fk_genero: form.fk_genero.value
            }

             const response = await post('core/routes/api/updateResidente.php', dataForm);


            location.href = './residentes';

        });

    }

}